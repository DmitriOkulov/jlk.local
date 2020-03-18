@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row mb-3">
        @if(Auth::user()->isAdmin())
            <a href="{{ route('visitors.edit', $visitor) }}" class="btn btn-primary mr-1">Редактировать</a>
            <form method="POST" action="{{ route('visitors.destroy', $visitor) }}" class="mr-1">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Удалить</button>
            </form>
        @endif
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>Фамилия</th><td>{{ $visitor->surname }}</td>
        </tr>
        <tr>
            <th>Имя</th><td>{{ $visitor->name }}</td>
        </tr>
        <tr>
            <th>Отчество</th><td>{{ $visitor->patronymic }}</td>
        </tr>
        <tr>
            <th>Номер телефона</th><td>{{ $visitor->phone }}</td>
        </tr>
        <tr>
            <th>День рождения</th><td>
                @if ($visitor->birthday)
                    {{ date('d.m.Y', strtotime($visitor->birthday)) }}
                @endif</td>
        </tr>
        <tr>
            <th>Цвет кожи</th><td>{{ $visitor->skin_color }}</td>
        </tr>
        <tr>
            <th>Цвет волос</th><td>{{ $visitor->hair_color }}</td>
        </tr>
        <tr>
            <th>Употребляет ли гормоны/антибиотики?</th><td>{{ $visitor->gormons }}</td>
        </tr>
        <tr>
            <th>Противопоказания</th><td>{{ $visitor->contraindication }}</td>
        </tr>
        <tbody>
        </tbody>
    </table>

    <h2>Параметры</h2>  
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Дата измерения</th>
                <th>Вес</th>
                <th>Замеры</th>
                <th>Сотрудник</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($weights as $weight)
            <tr>
                <td>
                    @if ($weight->date)
                        {{ date('d.m.Y', strtotime($weight->date)) }}
                    @endif
                </td>
                <td>{{ $weight->value }}</td>
                <td>{{ $weight->measure }}</td>
                <td><a href="{{ route('admin.users.show', $weight->id_user) }}" target="_blank">{{ Auth::user($weight->id_user)->name }}</a></td>
                <td>
                    @if (Auth::user()->isAdmin())
                        <form method="POST" action="{{ route('weights.destroy', $weight) }}" class="mr-1">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Удалить</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p><a href="{{ route('weights.create') }}?visitor={{ $visitor->id }}" class="btn btn-success">Добавить измерение</a></p>

@endsection