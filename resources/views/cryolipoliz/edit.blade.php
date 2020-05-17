@extends('layouts.app')

@section('content')
<h1>Изменить Криолиполиз</h1>
    <form method="POST" action="{{ route('cryolipoliz.update', $cryolipoliz) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date" class="col-form-label">Дата</label>
            <input id="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" type="date" value="{{ old('date', $cryolipoliz->date) }}">
            @if ($errors->has('date'))
                <span class="invalid-feedback"><strong>{{ $errors->first('date') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="zone" class="col-form-label">Зоны</label>
            <input id="zone" class="form-control{{ $errors->has('zone') ? ' is-invalid' : '' }}" name="zone" type="text" value="{{ old('zone', $cryolipoliz->zone) }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('zone') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="id_visitor" class="col-form-label">Посетитель</label>
            <select name="id_visitor" size="10">
                @foreach($visitors as $visitor)
                    <option value="{{ $visitor->id }}" 
                    @if($cryolipoliz->id_visitor==$visitor->id) 
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