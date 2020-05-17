@extends('layouts.app')

@section('content')
<h1>Добавить Лазерную эпиляцию</h1>
    <form method="POST" action="{{ route('laserepilation.store') }}">
        @csrf
        <div class="form-group">
            <label for="date" class="col-form-label">Дата</label>
            <input id="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" type="date" value="{{ date('Y-m-d') }}">
            @if ($errors->has('date'))
                <span class="invalid-feedback"><strong>{{ $errors->first('date') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="percent" class="col-form-label">Процент</label>
            <input id="percent" class="form-control{{ $errors->has('percent') ? ' is-invalid' : '' }}" name="percent" type="text" value="{{ old('percent') }}" required>
            @if ($errors->has('percent'))
                <span class="invalid-feedback"><strong>{{ $errors->first('percent') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="zone" class="col-form-label">Зоны</label>
            <input id="zone" class="form-control{{ $errors->has('zone') ? ' is-invalid' : '' }}" name="zone" type="text" value="{{ old('zone') }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('zone') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="ms" class="col-form-label">мс</label>
            <input id="ms" class="form-control{{ $errors->has('ms') ? ' is-invalid' : '' }}" type="text" name="ms" value="{{ old('ms') }}">
            @if ($errors->has('ms'))
                <span class="invalid-feedback"><strong>{{ $errors->first('ms') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="gc" class="col-form-label">Гц</label>
            <input id="gc" class="form-control{{ $errors->has('gc') ? ' is-invalid' : '' }}" type="text" name="gc" value="{{ old('gc') }}">
            @if ($errors->has('gc'))
                <span class="invalid-feedback"><strong>{{ $errors->first('gc') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="comment" class="col-form-label">Комментарий</label>
            <textarea name="comment">{{ old('comment') }}</textarea>
        </div>

        <input type="hidden" name="id_visitor" value="{{ $_GET['visitor'] }}">
        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
@endsection