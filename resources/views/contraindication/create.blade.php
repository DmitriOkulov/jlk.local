@extends('layouts.app')

@section('content')
    <h1>Добавить противопоказание</h1>
    <form method="POST" action="{{ route('contraindication.store') }}">
        @csrf

        <div class="form-group">
            <label for="date" class="col-form-label">Дата</label>
            <input id="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" type="date" value="{{ date('Y-m-d') }}" required>
            @if ($errors->has('date'))
                <span class="invalid-feedback"><strong>{{ $errors->first('date') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="weight" class="col-form-label"></label>
            <textarea id="weight" class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}" name="value">{{ old('value') }}</textarea>
            @if ($errors->has('value'))
                <span class="invalid-feedback"><strong>{{ $errors->first('value') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="comment" class="col-form-label">Комментарий</label>
            <textarea name="comment">{{ old('comment') }}</textarea>
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