@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="form-group">
            <label for="name" class="col-form-label">Имя</label>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="email" class="col-form-label">E-Mail</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="password" class="col-form-label">Пароль</label>
            <input id="password" type="text" class="form-control" name="password" value="{{ old('password') }}" required>
        </div>

        <div class="form-group">
            <label for="role" class="col-form-label">Роль</label>
            <select name="role">
                <option value="user" selected>Пользователь</option>
                <option value="admin">Администратор</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>

@endsection