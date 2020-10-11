<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
	public function show()
	{
		$data_orders = Orders::select('orders.id',
		                   				'orders.tanggal_order',
		                   				'orders.jml_pesanan',
		                   				'orders.total_harga')
		                       ->get();
		return Response()->json($data_orders);

	}
	public function detail($id)
	{
		if(Orders::where('id', $id)->exists()) {
			$data_orders= Orders::join('cs', 'orders.id_cs', 'cs.id_cs')
									->join('product', 'orders.id_p', 'product.id_p')
									->select('nama_cs','gender', 'alamat', 'tanggal_order', 'jml_pesanan', 'total_harga', 'nama_produk', 'kode_produksi','kadaluarsa')
									->where('orders.id', '=', $id)
									->get();

			return Response()->json($data_orders);
		}
		else{
			return Response()->json(['message' => 'tidak ditemukan']);
		}
	}

	public function store(Request $request)
	{
		$validator=Validator::make($request->all(),
			[
				'tanggal_order' => 'required',
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
			'tanggal_order' => $request->tanggal_order,
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
	public function update($id, Request $request)
	{
		$validator=Validator::make($request->all(),
			[
				'tanggal_order' => 'required',
				'jml_pesanan' 	=> 'required',
				'total_harga' 	=> 'required',
				'id_cs' 		=> 'required',
				'id_p' 			=> 'required'
			]
		);

		if($validator->fails()) {
			return Response()->json($validator->errors());
		}

		$ubah = Orders::where('id',$id)->update([
			'tanggal_order' => $request->tanggal_order,
			'jml_pesanan'   => $request->jml_pesanan,
			'total_harga'   => $request->total_harga,
			'id_cs'			=> $request->id_cs,
			'id_p'			=> $request->id_p
		]);
		if($ubah) {
			return Response()->json(['status' => 'sukses']);
		}
		else {
			return Response()->json(['status' => 'gagal']);
		}
	}
	public function destroy($id)
	{
		$hapus = Orders::where('id', $id)->delete();
		if($hapus) {
			return Response()->json(['status' => 'sukses']);
		}
		else {
			return Response()->json(['status' => 'gagal']);
		}
	}
}
