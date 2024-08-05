<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    /**
     * Creates a listing of the resource.
     */
    public function create()
    {
        return view('create-form');
    }

    /**
     * Creates a listing of the resource.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "first_name" => "required|string",
                "last_name" => "required|string",
                "id_number" => "required|min:11|max:11",
                "phone" => "required|regex:/^\d{10}$/",
                "address" => "required|string"
            ]);
            Session::put('kvkk',encrypt(json_encode($request->all())));
            flash()->success('Hasta bilgileri başarıyla alındı.');
            return view('kvkk');
        } catch (\Throwable $th) {
            Log::error("Kullanıcı form oluşturma sırasında bir sorun oluştu! Error: ".$th->getMessage());
            flash()->error("Kullanıcı bilgileri hatalı.");
            return redirect()->back();
        }
    }

    public function saveUserForm(Request $request)
    {
        try {
            $request->validate([
                "image_data" => "required",
                "is_accepted" => "required"
            ],[
                'image_data.required' => 'İmza alanı eksik. Lütfen imza alanını doldurunuz!',
                'is_accepted.required' => 'Aydınlatma metnini onaylamanız gerekmektedir!',
            ]);
            if ($request->is_accepted !== "on") {
                throw new Exception("Kvkk aydınlatma metnini onaylamanız gerekmektedir!");
            }

            $kvkk = json_decode(decrypt(Session::get('kvkk')));

            $imageData = $request->input('image_data');
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $image = base64_decode($imageData);
            $fileName = $kvkk->first_name.'-'.$kvkk->last_name.'-'.Carbon::now()->format("Y-m-d-His").'.png';
            
            file_put_contents(public_path('assets/custom/pdf-signs/'.$fileName), $image);
            $form = new Form();
            $form->user_id = Auth::id();
            $form->patient_name = $kvkk->first_name;
            $form->patient_surname = $kvkk->last_name;
            $form->patient_id = $kvkk->id_number;
            $form->patient_phone = $kvkk->phone;
            $form->patient_address = $kvkk->address;
            $form->sign_image_path = $fileName;
            if(!$form->save())
            {
                throw new Exception("Kayıt işlemi sırasında bir hata oluştu!");
            }
            Session::forget('kvkk');
            flash()->success("Kullanıcı form kaydı başarıyla tamamlanmıştır!");
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            flash()->error($th->getMessage());
            return view("kvkk");
        }
    }
}
