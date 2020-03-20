@extends('layouts.app')

@section('content')
<h1>Добавить Массаж</h1>
    <form method="POST" action="{{ route('length.store') }}">
        @csrf
        <div class="form-group">
            <label for="date" class="col-form-label">Дата</label>
            <input id="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" type="date" value="{{ old('date') }}">
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
            <label for="length" class="col-form-label">Продолжительность</label>
            <input id="length" class="form-control{{ $errors->has('length') ? ' is-invalid' : '' }}" name="length" type="text" value="{{ old('length') }}">
            @if ($errors->has('length'))
                <span class="invalid-feedback"><strong>{{ $errors->first('length') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="comment" class="col-form-label">Комментарий</label>
            <textarea name="comment">{{ old('comment') }}</textarea>
        </div>

        <div class="form-group">
            <label for="id_visitor" class="col-form-label">Посетитель</label>
            <select name="id_visitor" size="10">
                @foreach($visitors as $visitor)
                    <option value="{{ $visitor->id }}" 
                    @if(isset($_GET['visitor']) and $_GET['visitor']==$visitor->id) 
                        selected
                    @endif
                    >{{ $visitor->surname }} {{ $visitor->name }} {{ $visitor->patronymic }}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
@endsection