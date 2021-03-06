@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Modifier un utilisateur') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user_update', $user->id ) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom / Prénom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ $user->password }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if (Auth::user()->role_id == 1)

                        <div class="form-group row">
                            <label for="exampleFormControlSelect2" class="col-md-4 col-form-label text-md-right">Rôle de l'utilisateur</label>
                            <div class="col-md-6">
                                <select class="form-control" id="exampleFormControlSelect2">
                                    <option
                                    @if ($user->role_id == 3)
                                    {{'selected'}}
                                    @endif
                                    value="3" >Elève</option>
                                    <option
                                    @if ($user->role_id == 2)
                                    {{'selected'}}
                                    @endif
                                    value="2">Professeur</option>
                                    <option
                                    @if ($user->role_id == 1)
                                    {{'selected'}}
                                    @endif
                                    value="1">Administrateur</option>
                                </select>
                            </div>
                        </div>
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-success">
                                    {{ __('Valider') }}
                                </button>
                                @if (Auth::user()->role_id == 1 && Auth::user()->id != $user->id)
                                <a href="{{ route ('user_delete', $user->id) }}" class="btn btn-outline-danger">Supprimer le profil</a>
                                @endif
                            </div>
                        </div>
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
