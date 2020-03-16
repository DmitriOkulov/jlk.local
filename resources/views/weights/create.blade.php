@extends('layouts.app')

@section('content')
    <h1>Добавить вес (измерение тела)</h1>
    <form method="POST" action="{{ route('weights.store') }}">
        @csrf

        <div class="form-group">
            <label for="date" class="col-form-label">Дата измерения</label>
            <input id="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" type="date" value="{{ old('date') }}">
            @if ($errors->has('date'))
                <span class="invalid-feedback"><strong>{{ $errors->first('date') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="value" class="col-form-label">Вес</label>
            <input id="value" class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}" name="value" type="text" value="{{ old('value') }}" required>
            @if ($errors->has('value'))
                <span class="invalid-feedback"><strong>{{ $errors->first('value') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="measure" class="col-form-label">Измерения</label>
            <input id="measure" class="form-control{{ $errors->has('measure') ? ' is-invalid' : '' }}" name="measure" type="text" value="{{ old('measure') }}" required>
            @if ($errors->has('measure'))
                <span class="invalid-feedback"><strong>{{ $errors->first('measure') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label class="col-form-label">Посетитель: {{ $visitor->surname }} {{ $visitor->name }}</label>
        </div>
        <input type="hidden" name="id_visitor" value="{{ $visitor->id }}">
        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
@endsection