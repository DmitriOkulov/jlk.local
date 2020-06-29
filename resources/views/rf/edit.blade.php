@extends('layouts.app')

@section('content')
<h1>Изменить RF лифтинг</h1>
    <form method="POST" action="{{ route('rf.update', $rf) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date" class="col-form-label">Дата</label>
            <input id="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" type="date" value="{{ old('date', $rf->date) }}">
            @if ($errors->has('date'))
                <span class="invalid-feedback"><strong>{{ $errors->first('date') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="stomach" class="col-form-label">Живот</label>
            <input id="stomach" class="form-control{{ $errors->has('stomach') ? ' is-invalid' : '' }}" name="stomach" type="text" value="{{ old('stomach', $rf->stomach) }}">
            @if ($errors->has('stomach'))
                <span class="invalid-feedback"><strong>{{ $errors->first('stomach') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="ass" class="col-form-label">Ягодицы</label>
            <input id="ass" class="form-control{{ $errors->has('ass') ? ' is-invalid' : '' }}" name="ass" type="text" value="{{ old('ass', $rf->ass) }}">
            @if ($errors->has('ass'))
                <span class="invalid-feedback"><strong>{{ $errors->first('ass') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="hips" class="col-form-label">Бедра</label>
            <input id="hips" class="form-control{{ $errors->has('hips') ? ' is-invalid' : '' }}" name="hips" type="text" value="{{ old('hips', $rf->hips) }}">
            @if ($errors->has('hips'))
                <span class="invalid-feedback"><strong>{{ $errors->first('hips') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="comment" class="col-form-label">Комментарий</label>
            <textarea name="comment">{{ old('comment', $rf->comment) }}</textarea>
        </div>

        <div class="form-group">
            <label for="id_visitor" class="col-form-label">Посетитель (id)</label>
            <input id="id_visitor" class="form-control{{ $errors->has('id_visitor') ? ' is-invalid' : '' }}" name="id_visitor" type="text" value="{{ old('id_visitor', $rf->id_visitor) }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
    </form>
@endsection