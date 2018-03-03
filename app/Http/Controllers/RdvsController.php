<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Rdv;

class RdvsController extends Controller
{
  public function add(){

  }

  public function create(Request $request)
  {
    $rdv = new Rdv();
    $rdv->name = $_POST['name'];
    $rdv->title = $_POST['title'];
    //convertir en timestamp avec strtotime
    //$rdv->timestamp = strtotime($data['timestamp']);
    $rdv->id_user = Auth::user()->id;;

    $rdv->save();
    return redirect('/home');
  }

  public function update(Rdv $rdv)
  {
    $rdv->name = $_POST['name'];
    $rdv->title = $_POST['title'];
    //convertir en timestamp avec strtotime
    //$rdv->timestamp = strtotime($data['timestamp']);

    $rdv->save();
    return redirect('/home');
  }

  public function delete($id)
  {
    $rdv = Rdv::find($id);
    $rdv->delete();
    
    return redirect('/home');
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
