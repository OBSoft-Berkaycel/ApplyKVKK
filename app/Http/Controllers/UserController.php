<?php

namespace App\Http\Controllers;

use App\Library\Enums\UserType;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("create-user");
    }
    /**
     * Returns login page.
     */
    public function create()
    {
        return view("auth.custom-login");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            if(Auth::user()->type != 2)
            {
                return redirect()->back();
            }
            $request->validate([
                'username' => ['required', 'string', 'max:255', 'unique:users,username'],
                'firstname' => ['required', 'string'],
                'lastname' => ['required', 'string'],
                'role' => ['required', 'string', 'in:ADMIN,USER'],
                'email' => ['required', 'email', 'unique:users,email'],
                'phone' => ['required', 'regex:/^\d{10}$/', 'unique:users,phone'],
                'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', 'confirmed'],
            ]);
    
            $user = new User();
            $user->name = $request->firstname;
            $user->surname = $request->lastname;
            $user->username = $request->username;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->type = $request->role == 'ADMIN' ? UserType::ADMIN->value : UserType::USER->value;
            if (!$user->save()) {
                throw new Exception("Kullanıcı oluşturma işleminde sorun oluştu. Lütfen Yöneticiniz ile iletişime geçiniz!");
            }
            flash()->success('Yeni kullanıcı kaydı başarıyla oluşturuldu.');
            return redirect('/');
        } catch (\Throwable $th) {
            Log::error("Yeni kullanıcı kaydı oluşturma sırasında bir sorun oluştu! Error: ".$th->getMessage());
            flash()->error("Yeni kullanıcı kaydı oluşturma sırasında bir sorun oluştu!");
            return redirect()->route('user.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        return view('update-user',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'username' => ['required', 'string', 'max:255', 'unique:users,username,'. Auth::id()],
                'firstname' => ['required', 'string'],
                'lastname' => ['required', 'string'],
                'email' => ['required','email','unique:users,email,' . Auth::id()],
                'phone' => ['required', 'regex:/^\d{10}$/', 'unique:users,phone,'. Auth::id()],
            ]);

            if($request->password)
            {
                $request->validate([
                    'password' => ['string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', 'confirmed'],
                ]);
            }
            $user = User::find(Auth::id());
            $user->name = $request->firstname;
            $user->surname = $request->lastname;
            $user->username = $request->username;
            $user->phone = $request->phone;
            $user->email = $request->email;
            if($request->password)
            {
                $user->password = Hash::make($request->password);
            }
            if (!$user->save()) {
                throw new Exception("Kullanıcı bilgileri güncelleme işleminde sorun oluştu. Lütfen Yöneticiniz ile iletişime geçiniz!");
            }
            flash()->success('Kullanıcı bilgileriniz başarıyla güncellenmiştir.');
            return redirect('/');
        } catch (\Throwable $th) {
            Log::error("Kullanıcı bilgileri güncelleme sırasında bir sorun oluştu! Error: ".$th->getMessage());
            flash()->error("Kullanıcı bilgileri güncelleme sırasında bir sorun oluştu!");
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
