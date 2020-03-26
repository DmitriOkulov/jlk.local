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
                <th>Левый трицепс</th>
                <th>Правый трицепс</th>
                <th>Талия</th>
                <th>Бока</th>
                <th>Ягодицы</th>
                <th>Левое бедро</th>
                <th>Правое бедро</th>
                <th>Левая икра</th>
                <th>Правая икра</th>
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
                <td>{{ $weight->weight }}</td>
                <td>{{ $weight->left_triceps }}</td>
                <td>{{ $weight->right_triceps }}</td>
                <td>{{ $weight->waist }}</td>
                <td>{{ $weight->sides }}</td>
                <td>{{ $weight->ass }}</td>
                <td>{{ $weight->left_hip }}</td>
                <td>{{ $weight->right_hip }}</td>
                <td>{{ $weight->left_calf }}</td>
                <td>{{ $weight->right_calf }}</td>
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

    <h2>Массаж</h2>
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
    <p><a href="{{ route('massage.create') }}?visitor={{ $visitor->id }}" class="btn btn-success">Добавить Массаж</a></p>

    <h2>Лазерные эпиляции</h2>
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
        @foreach ($laserepilation as $visitor)
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
    <p><a href="{{ route('laserepilation.create') }}?visitor={{ $visitor->id }}" class="btn btn-success">Добавить Лазерную эпиляцию</a></p>

    <h2>Миостимуляции</h2>
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
    <p><a href="{{ route('miostimulation.create') }}?visitor={{ $visitor->id }}" class="btn btn-success">Добавить Миостимуляцию</a></p>

@endsection