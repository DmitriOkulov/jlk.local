@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <p><a href="{{ route('visitors.create') }}" class="btn btn-success">Добавить посетителя</a></p>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Фамилия</th>
                    <th>Имя Отчество</th>
                    <th>День рождения</th>
                    <th>Номер телефона</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($visitors as $visitor)
                    <tr>
                        <td><a href="{{ route('visitors.show', $visitor) }}">{{ $visitor->surname }}</a></td>
                        <td><a href="{{ route('visitors.show', $visitor) }}">{{ $visitor->name }} {{ $visitor->patronymic }}</a></td>
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
            <p><a href="{{ route('visitors.create') }}" class="btn btn-success">Добавить посетителя</a></p>
        </div>
    </div>
    

@endsection