@extends('layouts.app')

@section('content')
    
    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="email" class="col-form-label">E-Mail Address</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
        </div>
        
        <div class="form-group">
            <label for="password" class="col-form-label">Пароль</label>
            <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="">
            @if ($errors->has('password'))
                <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="role" class="col-form-label">Роль</label>
            <select name="role">
                
                @if(old('email', $user->role)=="user")
                    <option value="user" selected>Пользователь</option>
                @else
                    <option value="user">Пользователь</option>
                @endif

                @if(old('email', $user->role)=="admin")
                    <option value="admin" selected>Администратор</option>
                @else
                    <option value="admin">Администратор</option>
                @endif

            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection