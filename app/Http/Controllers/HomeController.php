<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rdv;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id; 
        $rdvs = Rdv::All()->where('id_user', $user_id);
        
    return view('home', ['rdvs' =>$rdvs]);
    }
}
