@extends('layouts.app')

@section('content')
    <h1>Процедуры - Криолиполиз</h1>
    <p><a href="{{ route('cryolipoliz.create') }}" class="btn btn-success">Добавить Криолиполиз</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Дата</th>
            <th>Зона</th>
            <th>Комментарии</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cryolipolizes as $visitor)
            <tr>
                <td><a href="{{ route('cryolipoliz.show', $visitor) }}">
                    @if ($visitor->date)
                        {{ date('d.m.Y', strtotime($visitor->date)) }}
                    @endif
                </a></td>
                <td><a href="{{ route('cryolipoliz.show', $visitor) }}">{{ $visitor->zone }}</a></td>
                <td><a href="{{ route('cryolipoliz.show', $visitor) }}">{{ $visitor->comment }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p><a href="{{ route('cryolipoliz.create') }}" class="btn btn-success">Добавить Криолиполиз</a></p>

@endsection