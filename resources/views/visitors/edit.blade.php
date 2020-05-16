@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('visitors.update', $visitor) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="surname" class="col-form-label">Фамилия</label>
            <input id="surname" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" type="text" value="{{ old('surname', $visitor->surname) }}" required>
            @if ($errors->has('surname'))
                <span class="invalid-feedback"><strong>{{ $errors->first('surname') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="name" class="col-form-label">Имя</label>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" type="text" value="{{ old('name', $visitor->name) }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('surname') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="patronymic" class="col-form-label">Отчество</label>
            <input id="patronymic" class="form-control{{ $errors->has('patronymic') ? ' is-invalid' : '' }}" type="text" name="patronymic" value="{{ old('patronymic', $visitor->patronymic) }}">
            @if ($errors->has('patronymic'))
                <span class="invalid-feedback"><strong>{{ $errors->first('patronymic') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="phone" class="col-form-label">Номер телефона</label>
            <input id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" type="text" name="phone" value="{{ old('phone', $visitor->phone) }}">
            @if ($errors->has('phone'))
                <span class="invalid-feedback"><strong>{{ $errors->first('phone') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="birthday" class="col-form-label">День рождения</label>
            <input id="birthday" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" type="date" value="{{ old('birthday', $visitor->birthday) }}">
            @if ($errors->has('birthday'))
                <span class="invalid-feedback"><strong>{{ $errors->first('birthday') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="skin_color" class="col-form-label">Цвет кожи</label>
            <input id="skin_color" class="form-control{{ $errors->has('skin_color') ? ' is-invalid' : '' }}" name="skin_color" type="text" value="{{ old('skin_color', $visitor->skin_color) }}">
            @if ($errors->has('skin_color'))
                <span class="invalid-feedback"><strong>{{ $errors->first('skin_color') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="hair_color" class="col-form-label">Цвет волос</label>
            <input id="hair_color" class="form-control{{ $errors->has('hair_color') ? ' is-invalid' : '' }}" name="hair_color" type="text" value="{{ old('hair_color', $visitor->hair_color) }}">
            @if ($errors->has('hair_color'))
                <span class="invalid-feedback"><strong>{{ $errors->first('hair_color') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="gormons" class="col-form-label">Употребляет ли гормоны/антибиотики?</label>
            <input id="gormons" class="form-control{{ $errors->has('gormons') ? ' is-invalid' : '' }}" name="gormons" type="text" value="{{ old('gormons', $visitor->gormons) }}">
            @if ($errors->has('gormons'))
                <span class="invalid-feedback"><strong>{{ $errors->first('gormons') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="contraindication" class="col-form-label">Противопоказания</label>
            <textarea id="contraindication" name="contraindication">{{ old('contraindication') }}</textarea>
            @if ($errors->has('contraindication'))
                <span class="invalid-feedback"><strong>{{ $errors->first('contraindication') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection