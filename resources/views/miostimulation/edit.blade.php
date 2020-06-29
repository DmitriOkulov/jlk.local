@extends('layouts.app')

@section('content')
<h1>Изменить Миостимуляцию</h1>
    <form method="POST" action="{{ route('miostimulation.update', $miostimulation) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date" class="col-form-label">Дата</label>
            <input id="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" type="date" value="{{ old('date', $miostimulation->date) }}">
            @if ($errors->has('date'))
                <span class="invalid-feedback"><strong>{{ $errors->first('date') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="power" class="col-form-label">Процент</label>
            <input id="power" class="form-control{{ $errors->has('power') ? ' is-invalid' : '' }}" name="power" type="text" value="{{ old('power', $miostimulation->power) }}" required>
            @if ($errors->has('power'))
                <span class="invalid-feedback"><strong>{{ $errors->first('power') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="zone" class="col-form-label">Зоны</label>
            <input id="zone" class="form-control{{ $errors->has('zone') ? ' is-invalid' : '' }}" name="zone" type="text" value="{{ old('zone', $miostimulation->zone) }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('zone') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="program" class="col-form-label">Программа</label>
            <input id="program" class="form-control{{ $errors->has('program') ? ' is-invalid' : '' }}" type="text" name="program" value="{{ old('program', $miostimulation->program) }}">
            @if ($errors->has('program'))
                <span class="invalid-feedback"><strong>{{ $errors->first('program') }}</strong></span>
            @endif
        </div>


        <div class="form-group">
            <label for="comment" class="col-form-label">Комментарий</label>
            <textarea name="comment">{{ old('comment', $miostimulation->comment) }}</textarea>
        </div>

        <div class="form-group">
            <label for="id_visitor" class="col-form-label">Посетитель (id)</label>
            <input id="id_visitor" class="form-control{{ $errors->has('id_visitor') ? ' is-invalid' : '' }}" name="id_visitor" type="text" value="{{ old('id_visitor', $miostimulation->id_visitor) }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
    </form>
@endsection