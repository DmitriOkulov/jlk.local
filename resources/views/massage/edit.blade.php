@extends('layouts.app')

@section('content')
<h1>Изменить Массаж</h1>
    <form method="POST" action="{{ route('massage.update', $massage) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date" class="col-form-label">Дата</label>
            <input id="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" type="date" value="{{ old('date', $massage->date) }}">
            @if ($errors->has('date'))
                <span class="invalid-feedback"><strong>{{ $errors->first('date') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="power" class="col-form-label">Процент</label>
            <input id="power" class="form-control{{ $errors->has('power') ? ' is-invalid' : '' }}" name="power" type="text" value="{{ old('power', $massage->power) }}" required>
            @if ($errors->has('power'))
                <span class="invalid-feedback"><strong>{{ $errors->first('power') }}</strong></span>
            @endif
        </div>


        <div class="form-group">
            <label for="length" class="col-form-label">Продолжительность</label>
            <input id="length" class="form-control{{ $errors->has('length') ? ' is-invalid' : '' }}" type="text" name="length" value="{{ old('length', $massage->length) }}">
            @if ($errors->has('length'))
                <span class="invalid-feedback"><strong>{{ $errors->first('length') }}</strong></span>
            @endif
        </div>


        <div class="form-group">
            <label for="comment" class="col-form-label">Комментарий</label>
            <textarea name="comment">{{ old('comment', $massage->comment) }}</textarea>
        </div>

        <div class="form-group">
            <label for="id_visitor" class="col-form-label">Посетитель</label>
            <select name="id_visitor" size="10">
                @foreach($visitors as $visitor)
                    <option value="{{ $visitor->id }}" 
                    @if($miostimulation->id_visitor==$visitor->id) 
                        selected
                    @endif
                    >{{ $visitor->surname }} {{ $visitor->name }} {{ $visitor->patronymic }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
    </form>
@endsection