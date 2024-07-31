<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'patient_name', 'patient_surname', 'patient_id', 
        'patient_phone', 'patient_address', 'sign_image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
