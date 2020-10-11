<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cs;
use Illuminate\Support\Facades\Validator;

class CsController extends Controller
{
	public function show()
	{
		return Cs::select('id_cs', 'nama_cs')
					->get();
	}

	public function detail($id)
	{
		if(Cs::where('id_cs', $id)->exists()) {
			$data_cs = Cs::select('id_cs', 'nama_cs', 'gender', 'tanggal_lahir', 'alamat')
						->where('cs.id_cs', '=', $id)
								->get();

			return Response()->json($data_cs);
		}
		else{
			return Response()->json(['message' => 'tidak ditemukan']);
		}
	}
	public function store(Request $request)
	{
		$validator=Validator::make($request->all(),
			[
				'nama_cs'			=> 'required',
				'gender'			=> 'required',
				'tanggal_lahir'		=> 'required',
				'alamat' 			=> 'required'
			]
		); 

		if($validator->fails()) {
			return Response()->json($validator->errors());
		}   

		$simpan = Cs::create([

			'nama_cs'		   => $request->nama_cs,
			'gender'           => $request->gender,
			'tanggal_lahir'	   => $request->tanggal_lahir,
			'alamat'		   => $request->alamat

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
				'nama_cs'			=> 'required',
				'gender'		 	=> 'required',
				'tanggal_lahir' 	=> 'required',
				'alamat' 			=> 'required'
			]
		);

		if($validator->fails()) {
			return Response()->json($validator->errors());
		}

		$ubah = Cs::where('id_cs',$id)->update([
			'nama_cs'			 => $request->nama_cs,
			'gender'		     => $request->gender,
			'tanggal_lahir'		 => $request->tanggal_lahir,
			'alamat'			 => $request->alamat
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
		$hapus = Cs::where('id_cs', $id)->delete();
		if($hapus) {
			return Response()->json(['status' => 'sukses']);
		}
		else {
			return Response()->json(['status' => 'gagal']);
		}
	}
}
