<?php

namespace App\Http\Controllers;

use App\Library\Enums\UserType;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
            // dd(UserType::ADMIN->value);
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
            flash()->error($th->getMessage());
            return redirect()->route('user.create')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        dd("my profile");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
