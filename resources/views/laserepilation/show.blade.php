@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('laserepilation.edit', $laserepilation) }}" class="btn btn-primary mr-1">Редактировать</a>
        @if(Auth::user()->isAdmin())
            <form method="POST" action="{{ route('laserepilation.destroy', $laserepilation) }}" class="mr-1">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Удалить</button>
            </form>
        @endif
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>Дата</th><td>
                @if ($laserepilation->date)
                    {{ date('d.m.Y', strtotime($laserepilation->date)) }}
                @endif</td>
        </tr>
        <tr>
            <th>Процент</th><td>{{ $laserepilation->percent }}</td>
        </tr>
        <tr>
            <th>Зоны</th><td>{{ $laserepilation->zone }}</td>
        </tr>
        <tr>
            <th>мс</th><td>{{ $laserepilation->ms }}</td>
        </tr>
        <tr>
            <th>Гц</th><td>{{ $laserepilation->gc }}</td>
        </tr>

        <tr>
            <th>Комментарий</th><td>{{ $laserepilation->comment }}</td>
        </tr>

        <tr>
            <th>Посетитель</th><td><a href="{{ route('visitors.show', $visitor->id) }}">{{ $visitor->surname }} {{ $visitor->name }} {{ $visitor->patronymic }}</a></td>
        </tr>
        <tr>
            <th>Пользователь</th><td>{{ $laserepilation->userName }}</td>
        </tr>
        <tbody>
        </tbody>
    </table>


@endsection
