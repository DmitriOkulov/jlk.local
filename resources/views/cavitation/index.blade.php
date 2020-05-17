@extends('layouts.app')

@section('content')
    <h1>Процедуры - Ультразвуковая кавитация</h1>
    <p><a href="{{ route('cavitation.create') }}" class="btn btn-success">Добавить Ультразвуковая кавитация</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Дата</th>
            <th>Живот</th>
            <th>Ягодицы</th>
            <th>Бёдра</th>
            <th>Комментарии</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cavitations as $visitor)
            <tr>
                <td><a href="{{ route('cavitation.show', $visitor) }}">
                    @if ($visitor->date)
                        {{ date('d.m.Y', strtotime($visitor->date)) }}
                    @endif
                </a></td>
                <td><a href="{{ route('cavitation.show', $visitor) }}">{{ $visitor->stomach }}</a></td>
                <td><a href="{{ route('cavitation.show', $visitor) }}">{{ $visitor->ass }}</a></td>
                <td><a href="{{ route('cavitation.show', $visitor) }}">{{ $visitor->hips }}</a></td>
                <td><a href="{{ route('cavitation.show', $visitor) }}">{{ $visitor->comment }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p><a href="{{ route('cavitation.create') }}" class="btn btn-success">Добавить Ультразвуковая кавитация</a></p>

@endsection