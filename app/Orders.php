<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    public $timestamps = false;

    protected $fillable = ['nama_cs', 'tanggal_order', 'nama_produk', 'jml_pesanan', 'total_harga', 'id_cs', 'id_p'];
}
