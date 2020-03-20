@extends('layouts.app')

@section('content')
    <h1>Процедуры - Лазерные эпиляции</h1>
    <p><a href="{{ route('laserepilation.create') }}" class="btn btn-success">Добавить Лазерную эпиляцию</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Дата</th>
            <th>Процент</th>
            <th>Зона</th>
            <th>Гц</th>
            <th>мс</th>
            <th>Комментарии</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($laserepilations as $visitor)
            <tr>
                <td><a href="{{ route('laserepilation.show', $visitor) }}">
                    @if ($visitor->date)
                        {{ date('d.m.Y', strtotime($visitor->date)) }}
                    @endif
                </a></td>
                <td><a href="{{ route('laserepilation.show', $visitor) }}">{{ $visitor->percent }}</a></td>
                <td><a href="{{ route('laserepilation.show', $visitor) }}">{{ $visitor->zone }}</a></td>
                <td><a href="{{ route('laserepilation.show', $visitor) }}">{{ $visitor->gc }}</a></td>
                <td><a href="{{ route('laserepilation.show', $visitor) }}">{{ $visitor->ms }}</a></td>
                <td><a href="{{ route('laserepilation.show', $visitor) }}">{{ $visitor->comment }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p><a href="{{ route('laserepilation.create') }}" class="btn btn-success">Добавить Лазерную эпиляцию</a></p>
    

@endsection