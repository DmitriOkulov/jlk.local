@extends('layouts.app')

@section('content')
    <h1>Процедуры - Миостимуляции</h1>
    <p><a href="{{ route('miostimulation.create') }}" class="btn btn-success">Добавить Миостимуляцию</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Дата</th>
            <th>Мощность</th>
            <th>Зона</th>
            <th>Программа</th>
            <th>Комментарии</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($miostimulation as $visitor)
            <tr>
                <td><a href="{{ route('miostimulation.show', $visitor) }}">
                    @if ($visitor->date)
                        {{ date('d.m.Y', strtotime($visitor->date)) }}
                    @endif
                </a></td>
                <td><a href="{{ route('miostimulation.show', $visitor) }}">{{ $visitor->power }}</a></td>
                <td><a href="{{ route('miostimulation.show', $visitor) }}">{{ $visitor->zone }}</a></td>
                <td><a href="{{ route('miostimulation.show', $visitor) }}">{{ $visitor->program }}</a></td>
                <td><a href="{{ route('miostimulation.show', $visitor) }}">{{ $visitor->comment }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p><a href="{{ route('miostimulation.create') }}" class="btn btn-success">Добавить Миостимуляцию</a></p>
    

@endsection