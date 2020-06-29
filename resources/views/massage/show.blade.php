@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row mb-3">
        @if(Auth::user()->isAdmin())
            <a href="{{ route('massage.edit', $massage) }}" class="btn btn-primary mr-1">Редактировать</a>
            <form method="POST" action="{{ route('massage.destroy', $massage) }}" class="mr-1">
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
                @if ($massage->date)
                    {{ date('d.m.Y', strtotime($massage->date)) }}
                @endif</td>
        </tr>
        <tr>
            <th>Мощность</th><td>{{ $massage->power }}</td>
        </tr>
        <tr>
            <th>Продолжительность</th><td>{{ $massage->length }}</td>
        </tr>

        <tr>
            <th>Комментарий</th><td>{{ $massage->comment }}</td>
        </tr>
        
        <tr>
            <th>Посетитель</th><td><a href="{{ route('visitors.show', $visitor->id) }}">{{ $visitor->surname }} {{ $visitor->name }} {{ $visitor->patronymic }}</a></td>
        </tr>
        <tr>
            <th>Пользователь</th><td>{{ $user->name }}</td>
        </tr>
        <tbody>
        </tbody>
    </table>


@endsection