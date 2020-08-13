<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
	public function store(Request $request)
	{
		$validator=Validator::make($request->all(),
			[
				'nama_cs'       => 'required',
				'tanggal_order' => 'required',
				'nama_produk'   => 'required',
				'jml_pesanan'   => 'required',
				'total_harga'   => 'required',
				'id_cs'			=> 'required',
				'id_p'			=> 'required'
			]
		); 

		if($validator->fails()) {
			return Response()->json($validator->errors());
		}   

		$simpan = Orders::create([
			'nama_cs'       => $request->nama_cs,
			'tanggal_order' => $request->tanggal_order,
			'nama_produk'   => $request->nama_produk,
			'jml_pesanan'   => $request->jml_pesanan,
			'total_harga'   => $request->total_harga,
			'id_cs'			=> $request->id_cs,
			'id_p'			=> $request->id_p
		]);

		if($simpan) {
			return Response()->json(['status'=> 1]);
		}
		else {
			return Response()->json(['status'=> 0]);
		}
	}
}
