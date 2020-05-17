@extends('layouts.app')

@section('content')
    <h1>Процедуры - RF лифтинг</h1>
    <p><a href="{{ route('rf.create') }}" class="btn btn-success">Добавить RF лифтинг</a></p>

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
        @foreach ($rfs as $visitor)
            <tr>
                <td><a href="{{ route('rf.show', $visitor) }}">
                    @if ($visitor->date)
                        {{ date('d.m.Y', strtotime($visitor->date)) }}
                    @endif
                </a></td>
                <td><a href="{{ route('rf.show', $visitor) }}">{{ $visitor->stomach }}</a></td>
                <td><a href="{{ route('rf.show', $visitor) }}">{{ $visitor->ass }}</a></td>
                <td><a href="{{ route('rf.show', $visitor) }}">{{ $visitor->hips }}</a></td>
                <td><a href="{{ route('rf.show', $visitor) }}">{{ $visitor->comment }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p><a href="{{ route('rf.create') }}" class="btn btn-success">Добавить RF лифтинг</a></p>

@endsection