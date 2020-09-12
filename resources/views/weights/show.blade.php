@extends('layouts.app')

@section('content')
    <h1>Измерение тела</h1>
    <form method="POST" action="{{ route('weights.update', $weight) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date" class="col-form-label">Дата измерения</label>
            <input id="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" type="date" value="{{ old('weight', date('Y-m-d', strtotime($weight->date))) }}" required>
            @if ($errors->has('date'))
                <span class="invalid-feedback"><strong>{{ $errors->first('date') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="weight" class="col-form-label">Вес</label>
            <input id="weight" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" type="text" value="{{ old('weight', $weight->weight) }}">
            @if ($errors->has('weight'))
                <span class="invalid-feedback"><strong>{{ $errors->first('weight') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="left_triceps" class="col-form-label">Левый трицепс</label>
            <input id="left_triceps" class="form-control{{ $errors->has('left_triceps') ? ' is-invalid' : '' }}" name="left_triceps" type="text" value="{{ old('left_triceps', $weight->left_triceps) }}">
            @if ($errors->has('left_triceps'))
                <span class="invalid-feedback"><strong>{{ $errors->first('left_triceps') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="right_triceps" class="col-form-label">Правый трицепс</label>
            <input id="right_triceps" class="form-control{{ $errors->has('right_triceps') ? ' is-invalid' : '' }}" name="right_triceps" type="text" value="{{ old('right_triceps', $weight->right_triceps) }}">
            @if ($errors->has('right_triceps'))
                <span class="invalid-feedback"><strong>{{ $errors->first('right_triceps') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="waist" class="col-form-label">Талия</label>
            <input id="waist" class="form-control{{ $errors->has('waist') ? ' is-invalid' : '' }}" name="waist" type="text" value="{{ old('waist', $weight->waist) }}">
            @if ($errors->has('waist'))
                <span class="invalid-feedback"><strong>{{ $errors->first('waist') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="sides" class="col-form-label">Бока</label>
            <input id="sides" class="form-control{{ $errors->has('sides') ? ' is-invalid' : '' }}" name="sides" type="text" value="{{ old('sides', $weight->sides) }}">
            @if ($errors->has('sides'))
                <span class="invalid-feedback"><strong>{{ $errors->first('sides') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="ass" class="col-form-label">Ягодицы</label>
            <input id="ass" class="form-control{{ $errors->has('ass') ? ' is-invalid' : '' }}" name="ass" type="text" value="{{ old('ass', $weight->ass) }}">
            @if ($errors->has('ass'))
                <span class="invalid-feedback"><strong>{{ $errors->first('ass') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="left_hip" class="col-form-label">Левое бедро</label>
            <input id="left_hip" class="form-control{{ $errors->has('left_hip') ? ' is-invalid' : '' }}" name="left_hip" type="text" value="{{ old('left_hip', $weight->left_hip) }}">
            @if ($errors->has('left_hip'))
                <span class="invalid-feedback"><strong>{{ $errors->first('left_hip') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="right_hip" class="col-form-label">Правое бедро</label>
            <input id="right_hip" class="form-control{{ $errors->has('right_hip') ? ' is-invalid' : '' }}" name="right_hip" type="text" value="{{ old('right_hip', $weight->right_hip) }}">
            @if ($errors->has('right_hip'))
                <span class="invalid-feedback"><strong>{{ $errors->first('right_hip') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="left_calf" class="col-form-label">Левая икра</label>
            <input id="left_calf" class="form-control{{ $errors->has('left_calf') ? ' is-invalid' : '' }}" name="left_calf" type="text" value="{{ old('left_calf', $weight->left_calf) }}">
            @if ($errors->has('left_calf'))
                <span class="invalid-feedback"><strong>{{ $errors->first('left_calf') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="right_calf" class="col-form-label">Правая икра</label>
            <input id="right_calf" class="form-control{{ $errors->has('right_calf') ? ' is-invalid' : '' }}" name="right_calf" type="text" value="{{ old('right_calf', $weight->right_calf) }}">
            @if ($errors->has('right_calf'))
                <span class="invalid-feedback"><strong>{{ $errors->first('right_calf') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="comment" class="col-form-label">Комментарий</label>
            <textarea name="comment">{{ old('comment', $weight->comment) }}</textarea>
        </div>

        <div class="form-group">
            <label class="col-form-label">Посетитель: {{ $visitor->surname }} {{ $visitor->name }}</label>
            <br>
            <label class="col-form-label">Пользователь: {{ $weight->userName }}</label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
    </form>
@endsection
