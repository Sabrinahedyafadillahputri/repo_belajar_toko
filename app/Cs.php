<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cs extends Model
{
    protected $table ='cs';
    public $timestamps = false;

    protected $fillable = ['nama_cs', 'gender', 'tanggal_lahir', 'alamat'];
}
