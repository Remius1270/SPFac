<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Rdv;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show($id) {
        $user = User::findOrFail($id);

        return view('editAccount', ['user' => $user]);
    }

  public function update($id)
{

    $user = User::findOrFail($id);

    $user->first_name = $_POST['first_name'];

    $user->last_name = $_POST['last_name'];

    $user->email = $_POST['email'];

    $user->password = Hash::make($_POST['password']);

    $user->save();

    $rdvs = Rdv::All()->where('id_user', $user->id);

    return view('home', ['rdvs' => $rdvs]);

}

  public function find($name)
  {
    $users = DB::table('users')->where('first_name',$name)->orWhere('last_name',$name);
    //permet de chercher selon le nom ou prénom
    return redirect('users',[
      'users' => $name
    ]);
  }

}
