<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table ='login';
    public $timestamps = false;

    protected $fillable = ['nama_cs', 'password', 'id_cs']; 
}
