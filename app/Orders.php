<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    public $timestamps = false;

    protected $fillable = ['tanggal_order', 'jml_pesanan', 'total_harga', 'id_cs', 'id_p'];
}
