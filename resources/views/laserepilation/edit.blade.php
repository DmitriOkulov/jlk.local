@extends('layouts.app')

@section('content')
<h1>Изменить Лазерную эпиляцию</h1>
    <form method="POST" action="{{ route('laserepilation.update', $laserepilation) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date" class="col-form-label">Дата</label>
            <input id="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" type="date" value="{{ old('date', $laserepilation->date) }}">
            @if ($errors->has('date'))
                <span class="invalid-feedback"><strong>{{ $errors->first('date') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="percent" class="col-form-label">Процент</label>
            <input id="percent" class="form-control{{ $errors->has('percent') ? ' is-invalid' : '' }}" name="percent" type="text" value="{{ old('percent', $laserepilation->percent) }}" required>
            @if ($errors->has('percent'))
                <span class="invalid-feedback"><strong>{{ $errors->first('percent') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="zone" class="col-form-label {{ $errors->has('zone') ? ' is-invalid' : '' }}">Зоны</label>
            @foreach (App\Models\LaserEpilation::ZONES as $z)
                <div class="form_check">
                    <input name="zone[]" type="checkbox" value="{{ $z }}" @if(old('zone', json_decode($laserepilation->zone, true))) @foreach(old('zone', json_decode($laserepilation->zone, true)) as $zone) @if($zone==$z) checked @endif @endforeach @endif><span> {{ $z }}</span>
                </div>
            @endforeach
            @if ($errors->has('zone'))
                <span class="invalid-feedback"><strong>{{ $errors->first('zone') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="ms" class="col-form-label">мс</label>
            <input id="ms" class="form-control{{ $errors->has('ms') ? ' is-invalid' : '' }}" type="text" name="ms" value="{{ old('ms', $laserepilation->ms) }}">
            @if ($errors->has('ms'))
                <span class="invalid-feedback"><strong>{{ $errors->first('ms') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="gc" class="col-form-label">Гц</label>
            <input id="gc" class="form-control{{ $errors->has('gc') ? ' is-invalid' : '' }}" type="text" name="gc" value="{{ old('gc', $laserepilation->gc) }}">
            @if ($errors->has('gc'))
                <span class="invalid-feedback"><strong>{{ $errors->first('gc') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="comment" class="col-form-label">Комментарий</label>
            <textarea name="comment">{{ old('comment', $laserepilation->comment) }}</textarea>
        </div>

        <div class="form-group">
            <label for="id_visitor" class="col-form-label">Посетитель (id)</label>
            <input id="id_visitor" class="form-control{{ $errors->has('id_visitor') ? ' is-invalid' : '' }}" name="id_visitor" type="text" value="{{ old('id_visitor', $laserepilation->id_visitor) }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
    </form>
@endsection
