<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        if($user->type != 2)
        {
            return redirect()->back();
        }
        $forms = Form::orderBy("created_at","DESC")->get();
        return view("form-list",compact('forms'));
    }

    public function downloadPdf(Form $form, PDF $pdf)
    {
        $user = Auth::user();
        if($user->type != 2)
        {
            return redirect()->back();
        }
        $imagePath = Storage::disk('public')->path($form->sign_image_path);
        $pdf = $pdf->loadView('custom.pdf', compact('form','imagePath'))
                ->setPaper('A4', 'portrait');

        return $pdf->download('kvkk_bilgilendirme_'.$form->patient_name.'_'.$form->patient_surname.'.pdf');
    }
}
