@extends('layouts.app')

@section('content')
<h1>Добавить RF лифтинг</h1>
    <form method="POST" action="{{ route('rf.store') }}">
        @csrf
        <div class="form-group">
            <label for="date" class="col-form-label">Дата</label>
            <input id="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" type="date" value="{{ date('Y-m-d') }}">
            @if ($errors->has('date'))
                <span class="invalid-feedback"><strong>{{ $errors->first('date') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="stomach" class="col-form-label">Живот</label>
            <input id="stomach" class="form-control{{ $errors->has('stomach') ? ' is-invalid' : '' }}" name="stomach" type="text" value="{{ old('stomach') }}">
            @if ($errors->has('stomach'))
                <span class="invalid-feedback"><strong>{{ $errors->first('stomach') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="ass" class="col-form-label">Ягодицы</label>
            <input id="ass" class="form-control{{ $errors->has('ass') ? ' is-invalid' : '' }}" name="ass" type="text" value="{{ old('ass') }}">
            @if ($errors->has('ass'))
                <span class="invalid-feedback"><strong>{{ $errors->first('ass') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="hips" class="col-form-label">Бедра</label>
            <input id="hips" class="form-control{{ $errors->has('hips') ? ' is-invalid' : '' }}" name="hips" type="text" value="{{ old('hips') }}">
            @if ($errors->has('hips'))
                <span class="invalid-feedback"><strong>{{ $errors->first('hips') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="comment" class="col-form-label">Комментарий</label>
            <textarea name="comment">{{ old('comment') }}</textarea>
        </div>

        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
        <input type="hidden" name="id_visitor" value="{{ $_GET['visitor'] }}">

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
@endsection