@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Rdv</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addRdv') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

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
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="timestamp" class="col-md-4 col-form-label text-md-right">Date</label>

                            <div class="col-md-6">
                                <div class="form-control-wrapper">
                                    <input name="timestamp" value="{{ old('timestamp') }}" type="text" id="timestamp_edit" class="form-control{{ $errors->has('timestamp') ? ' is-invalid' : '' }} floating-label" data-dtp="dtp_wVt9F">

                                    @if ($errors->has('timestamp'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('timestamp') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                      <!-- mettre qqch pour pick la date et l'heure -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
