@extends('layouts.app')

@section('content')
    <h1>Процедуры - Массаж</h1>
    <p><a href="{{ route('massage.create') }}" class="btn btn-success">Добавить Массаж</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Дата</th>
            <th>Мощность</th>
            <th>Продолжительность</th>
            <th>Программа</th>
            <th>Комментарии</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($massage as $visitor)
            <tr>
                <td><a href="{{ route('massage.show', $visitor) }}">
                    @if ($visitor->date)
                        {{ date('d.m.Y', strtotime($visitor->date)) }}
                    @endif
                </a></td>
                <td><a href="{{ route('massage.show', $visitor) }}">{{ $visitor->power }}</a></td>
                <td><a href="{{ route('massage.show', $visitor) }}">{{ $visitor->length }}</a></td>
                <td><a href="{{ route('massage.show', $visitor) }}">{{ $visitor->comment }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p><a href="{{ route('massage.create') }}" class="btn btn-success">Добавить Массаж</a></p>
    

@endsection