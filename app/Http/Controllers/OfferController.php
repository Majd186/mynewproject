<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function create(){
    	return view('ajaxoffers.create');
    }

    public function store(Request $request){
    	$file_name = $this->saveImage($request->photo,'images/offers');

    	Offer::create([
    		'name' => $request->name,
    		'price'=> $request->price,
    		'avatar' => $file_name,
    		'details' => $request->details
    	]);
    }
}
