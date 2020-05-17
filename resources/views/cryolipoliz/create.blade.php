@extends('layouts.app')

@section('content')
<h1>Добавить Криолиполиз</h1>
    <form method="POST" action="{{ route('cryolipoliz.store') }}">
        @csrf
        <div class="form-group">
            <label for="date" class="col-form-label">Дата</label>
            <input id="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" type="date" value="{{ date('Y-m-d') }}">
            @if ($errors->has('date'))
                <span class="invalid-feedback"><strong>{{ $errors->first('date') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="zone" class="col-form-label">Зоны</label>
            <input id="zone" class="form-control{{ $errors->has('zone') ? ' is-invalid' : '' }}" name="zone" type="text" value="{{ old('zone') }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('zone') }}</strong></span>
            @endif
        </div>

        <input type="hidden" name="id_visitor" value="{{ $_GET['visitor'] }}">
        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
@endsection