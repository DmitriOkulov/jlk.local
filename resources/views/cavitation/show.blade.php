@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('cavitation.edit', $cavitation) }}" class="btn btn-primary mr-1">Редактировать</a>
        @if(Auth::user()->isAdmin())
            <form method="POST" action="{{ route('cavitation.destroy', $cavitation) }}" class="mr-1">
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
                @if ($cavitation->date)
                    {{ date('d.m.Y', strtotime($cavitation->date)) }}
                @endif</td>
        </tr>

        <tr>
            <th>Живот</th><td>{{ $cavitation->stomach }}</td>
        </tr>

        <tr>
            <th>Ягодицы</th><td>{{ $cavitation->ass }}</td>
        </tr>

        <tr>
            <th>Бедра</th><td>{{ $cavitation->hips }}</td>
        </tr>

        <tr>
            <th>Посетитель</th><td><a href="{{ route('visitors.show', $visitor->id) }}">{{ $visitor->surname }} {{ $visitor->name }} {{ $visitor->patronymic }}</a></td>
        </tr>
        <tr>
            <th>Комментарий</th><td>{{ $cavitation->comment }}</td>
        </tr>
        <tr>
            <th>Пользователь</th><td>{{ $cavitation->userName }}</td>
        </tr>
        <tbody>
        </tbody>
    </table>


@endsection
