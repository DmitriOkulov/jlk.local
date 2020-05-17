@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row mb-3">
        @if(Auth::user()->isAdmin())
            <a href="{{ route('rf.edit', $rf) }}" class="btn btn-primary mr-1">Редактировать</a>
            <form method="POST" action="{{ route('rf.destroy', $rf) }}" class="mr-1">
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
                @if ($rf->date)
                    {{ date('d.m.Y', strtotime($rf->date)) }}
                @endif</td>
        </tr>

        <tr>
            <th>Живот</th><td>{{ $rf->stomach }}</td>
        </tr>

        <tr>
            <th>Ягодицы</th><td>{{ $rf->ass }}</td>
        </tr>

        <tr>
            <th>Бедра</th><td>{{ $rf->hips }}</td>
        </tr>
        
        <tr>
            <th>Посетитель</th><td><a href="{{ route('visitors.show', $visitor->id) }}">{{ $visitor->surname }} {{ $visitor->name }} {{ $visitor->patronymic }}</a></td>
        </tr>
        <tr>
            <th>Пользователь</th><td>{{ Auth::user($rf->id_user)->name }}</td>
        </tr>
        <tbody>
        </tbody>
    </table>


@endsection