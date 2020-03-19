@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row mb-3">
        @if(Auth::user()->isAdmin())
            <a href="{{ route('miostimulation.edit', $miostimulation) }}" class="btn btn-primary mr-1">Редактировать</a>
            <form method="POST" action="{{ route('miostimulation.destroy', $miostimulation) }}" class="mr-1">
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
                @if ($miostimulation->date)
                    {{ date('d.m.Y', strtotime($miostimulation->date)) }}
                @endif</td>
        </tr>
        <tr>
            <th>Мощность</th><td>{{ $miostimulation->power }}</td>
        </tr>
        <tr>
            <th>Зоны</th><td>{{ $miostimulation->zone }}</td>
        </tr>
        <tr>
            <th>Программа</th><td>{{ $miostimulation->program }}</td>
        </tr>

        <tr>
            <th>Комментарий</th><td>{{ $miostimulation->comment }}</td>
        </tr>
        
        <tr>
            <th>Посетитель</th><td><a href="{{ route('visitors.show', $visitor->id) }}">{{ $visitor->surname }} {{ $visitor->name }} {{ $visitor->patronymic }}</a></td>
        </tr>
        <tr>
            <th>Пользователь</th><td>{{ Auth::user($miostimulation->id_user)->name }}</td>
        </tr>
        <tbody>
        </tbody>
    </table>


@endsection