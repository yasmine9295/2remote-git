<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

Class AtelierController extends Controller {
    public function programmes(){
        return view('programmes');
    }

    public function passes(){
        return view("passes") ;
    }

    public function commentaire($num){
        return view('commentaire')-> with('num',$num); 
    }

    public function commenter($num){
        return view('commenter')-> with('num',$num) ;
    }




}