@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">Vos rendez-vous</div>
        <div class="card-body">
          <table class="table table-responsive-sm table-hover table-striped table-outline mb-0">
            <thead class="thead-light">
              <tr>
                <th>Date</th>
                <th>Nom</th>
                <th>Titre</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @if(count($rdvs)>0)
              @foreach($rdvs as $rdv)
              
              <tr>
                <td id="date_{{$rdv->id}}">{{date('d/m/Y à H\hi', strtotime($rdv->timestamp))}}</td>
                <td id="name_{{$rdv->id}}">{{$rdv->name}}</td>
                <td id="title_{{$rdv->id}}">{{$rdv->title}}</td>
                <td>
                    <button id="{{$rdv->id}}" class="btn btn-warning btn-edit" data-toggle="modal" data-target="#editModal">Editer</button>
                    <a href="/deleteRdv/{{ $rdv->id }}" class="btn btn-danger">Supprimer</a>
                </td>
              </tr>
              @endforeach
              @else
              <tr><td>Pas de rendez vous prévu.</td><tr/>
              @endif
            </tbody>
          </table>

          <button type="button" class="btn btn-primary btn-addrdv" data-toggle="modal" data-target="#myModal">Ajouter un Rendez-vous</button>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal add -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('addRdv') }}">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ajouter un Rendez-vous</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">

                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Titre</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     

                        <!-- mettre qqch pour pick la date et l'heure -->

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
       </form>
    </div>

  </div>
</div>

<!-- Modal edit -->
<div id="editModal" class="modal fade modal-warning" role="dialog">
  <div class="modal-dialog">
    <form method="POST" action="">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Modifier un Rendez-vous</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">

                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Titre</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     

                        <!-- mettre qqch pour pick la date et l'heure -->

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-warning">Modifier</button>
          </div>
       </form>
    </div>

  </div>
</div>
@endsection
