<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cs;
use Illuminate\Support\Facades\Validator;

class CsController extends Controller
{
	public function show()
	{
		return Cs::all();
	}
	public function store(Request $request)
	{
		$validator=Validator::make($request->all(),
			[
				'nama_cs' => 'required',
			]
		); 

		if($validator->fails()) {
			return Response()->json($validator->errors());
		}   

		$simpan = Cs::create([
			'nama_cs' => $request->nama_cs,
			
		]);

		if($simpan) {
			return Response()->json(['status'=> 1]);
		}
		else {
			return Response()->json(['status'=> 0]);
		}
	}    
}
