@extends('layouts.app')

@section('content')
    <h1>Посетители</h1>
    <p><a href="{{ route('visitors.create') }}" class="btn btn-success">Добавить посетителя</a></p>

    <form method="GET">
        @isset($_GET['search'])
            <input type="text" name="search" placeholder="Поиск..." value="{{ $_GET['search'] }}">
        @else
            <input type="text" name="search" placeholder="Поиск...">
        @endisset
        <button type="submit">Найти</button>
    </form>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>День рождения</th>
            <th>Номер телефона</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($visitors as $visitor)
            <tr>
                <td><a href="{{ route('visitors.show', $visitor) }}">{{ $visitor->surname }}</a></td>
                <td><a href="{{ route('visitors.show', $visitor) }}">{{ $visitor->name }}</a></td>
                <td><a href="{{ route('visitors.show', $visitor) }}">{{ $visitor->patronymic }}</a></td>
                <td><a href="{{ route('visitors.show', $visitor) }}">
                @if ($visitor->birthday)
                    {{ date('d.m.Y', strtotime($visitor->birthday)) }}
                @endif
                </a></td>
                <td><a href="{{ route('visitors.show', $visitor) }}">{{ $visitor->phone }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $visitors->links() }}
    <p><a href="{{ route('visitors.create') }}" class="btn btn-success">Добавить посетителя</a></p>
    

@endsection