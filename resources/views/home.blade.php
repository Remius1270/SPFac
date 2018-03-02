@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Rdv</div>
        <div class="card-body">
          <table class="table table-responsive-sm table-hover table-outline mb-0">
            <thead class="thead-light">
              <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Title</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($rdv))
              <tr>
                <td>
                  {{$rdv->timestamp}}
                </td>
                <td>
                  {{$rdv->name}}
                </td>
                <td>
                  {{$rdv->title}}
                </td>
              </tr>
              @else
              <tr><td>No rendez-vous planned</td><tr/>
              @endif
            </tbody>
          </table>

          <a href="./addRdv" class="btn btn-primary">Add Rendez-vous</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
