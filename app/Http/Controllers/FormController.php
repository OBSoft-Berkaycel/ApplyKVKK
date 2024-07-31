<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // dd("store form",$request->all());
        return view('kvkk');
    }
}
