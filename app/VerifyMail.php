<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyMail extends Model
{
protected $table = 'verify_email_otp';
     protected $fillable = ['id ','email','status'];
    //
}
