@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h6>Modifier votre mot de passe</h6>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("profile.password.update") }}">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="title">Nouveau mot de passe</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="title">Confirmez le mot de passe</label>
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    Valider
                </button>
            </div>
        </form>
    </div>
</div>

@endsection