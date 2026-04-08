<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

Class ClientController extends Controller {
    public function enregistrement(){
        return view('enregistrement') ;
    }

    public function enregistrer(){
        return view('enregister') ;
    }

    public function connexion(){
        return view('connexion') ;
    }

    public function connecter(){
        return view('connecter') ;
    }

    public function espace(){
        return view ('espace') ;
    }

    public function profil(){
        return view('profil') ;
    }

    public function deconnecter(){
        return view('deconnecter') ;
    }
}