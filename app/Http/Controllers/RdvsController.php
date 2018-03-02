<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Rdv;

class AgendasController extends Controller
{
  public function add(){

  }

  public function create(Request $request)
  {
    $rdv = new Rdv();
    $rdv->name = $data['name'];
    $rdv->title = $data['title'];
    //convertir en timestamp avec strtotime
    $rdv->timestamp = strtotime($data['timestamp']);

    $rdv->save();
    return redirect('/home');
  }

  public function update(Rdv $rdv)
  {
    $rdv->name = $data['name'];
    $rdv->title = $data['title'];
    //convertir en timestamp avec strtotime
    $rdv->timestamp = strtotime($data['timestamp']);

    $rdv->save();
    return redirect('/home');
  }

  public function delete(Rdv $rdv)
  {
    $rdv->delete();
  }

  public function read($id)
  {
    $rdv = DB::table('rdv')->where('id', $id )->first();
    //vérifier comment arrive rdv , il faut qu'il sorte sous la forme d'un array avec les rdv.
    return redirect('home',[
      'rdv' => $rdv
    ]);
  }

  public function allRdv()
  {

    $rdv = DB::table('rdv')->where('id_user',Auth::user()->id);
    //vérifier comment arrive rdv , il faut qu'il sorte sous la forme d'un array avec les rdv.
    return redirect('editRdv',[
      'rdv' => $rdv
    ]);
  }

}
