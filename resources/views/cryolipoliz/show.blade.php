@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row mb-3">
        @if(Auth::user()->isAdmin())
            <a href="{{ route('cryolipoliz.edit', $cryolipoliz) }}" class="btn btn-primary mr-1">Редактировать</a>
            <form method="POST" action="{{ route('cryolipoliz.destroy', $cryolipoliz) }}" class="mr-1">
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
                @if ($cryolipoliz->date)
                    {{ date('d.m.Y', strtotime($cryolipoliz->date)) }}
                @endif</td>
        </tr>

        <tr>
            <th>Зоны</th><td>{{ $cryolipoliz->zone }}</td>
        </tr>
        
        <tr>
            <th>Посетитель</th><td><a href="{{ route('visitors.show', $visitor->id) }}">{{ $visitor->surname }} {{ $visitor->name }} {{ $visitor->patronymic }}</a></td>
        </tr>
        <tr>
            <th>Пользователь</th><td>{{ Auth::user($cryolipoliz->id_user)->name }}</td>
        </tr>
        <tbody>
        </tbody>
    </table>


@endsection