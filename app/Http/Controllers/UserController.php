<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class RdvsController extends Controller
{

  public function update($id, UserFormRequest $request)
{

    $user = User::findOrFail($id);

    $user->first_name = $request->get('first_name');

    $user->last_name = $request->get('last_name');

    $user->email = $request->get('email');

    $user->save();

    return view('home');

}

}
