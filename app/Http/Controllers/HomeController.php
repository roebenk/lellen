<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	/*
    	$abc = [
    		['Michael', 'Anastasakis.Michael@kpmg.nl'],
    		['Martijn', 'Blankert.Martijn@kpmg.nl'],
    		['Sille', 'Kamoen.Sille@kpmg.nl'],
    		['Wesley', 'vanderLee.Wesley@kpmg.nl'],
    		['Laurens', 'tenHacken.Laurens@kpmg.nl'],
    		['Rogier', 'Vrooman.Rogier@kpmg.nl'],
    		['Jurrit', 'Wilhelmus.Jurrit@kpmg.nl'],
    		['Mourad', 'ElMaouchi.Mourad@kpmg.nl'],
    		['Vincent', 'deJager.Vincent@kpmg.nl'],
    		['Wouter', 'vanderHouven.Wouter@kpmg.nl']
    	];
    	foreach($abc as $a) {
	    	$u = new User();
	    	$u->name = $a[0];
	    	$u->email = $a[1];
	    	$u->password = bcrypt(rand(1,9000000000000));
	    	$u->save();
    	}*/

    	$data['users']  = User::orderBy('rating', 'desc')->get();

        return view('home', $data);
    }
}
