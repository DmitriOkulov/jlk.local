@extends('layouts.app')

@section('content')
<h1>Добавить Миостимуляцию</h1>
    <form method="POST" action="{{ route('miostimulation.store') }}">
        @csrf
        <div class="form-group">
            <label for="date" class="col-form-label">Дата</label>
            <input id="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" type="date" value="{{ date('Y-m-d') }}">
            @if ($errors->has('date'))
                <span class="invalid-feedback"><strong>{{ $errors->first('date') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="power" class="col-form-label">Мощность</label>
            <input id="power" class="form-control{{ $errors->has('power') ? ' is-invalid' : '' }}" name="power" type="text" value="{{ old('power') }}" required>
            @if ($errors->has('power'))
                <span class="invalid-feedback"><strong>{{ $errors->first('power') }}</strong></span>
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
            <label for="program" class="col-form-label">Программа</label>
            <input id="program" class="form-control{{ $errors->has('program') ? ' is-invalid' : '' }}" type="text" name="program" value="{{ old('program') }}">
            @if ($errors->has('program'))
                <span class="invalid-feedback"><strong>{{ $errors->first('program') }}</strong></span>
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