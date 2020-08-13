<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    
	public function store(Request $request)
	{
		$validator=Validator::make($request->all(),
			[
				'nama_cs'  => 'required',
				'password' => 'required',
				'id_cs'	   => 'required'
			]
		); 

		if($validator->fails()) {
			return Response()->json($validator->errors());
		}   

		$simpan = Login::create([
			'nama_cs'  => $request->nama_cs,
			'password' => $request->password,
			'id_cs'    => $request->id_cs
			
		]);

		if($simpan) {
			return Response()->json(['status'=> 1]);
		}
		else {
			return Response()->json(['status'=> 0]);
		}
	}    
}