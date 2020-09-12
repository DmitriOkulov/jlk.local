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
            <th>Комментарий</th><td>{{ $visitor->comment }}</td>
        </tr>
        <tbody>
        </tbody>
    </table>
    @php
        $vs = $visitor->id;
    @endphp
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
                <th>Комментарий</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($weights as $weight)
            <tr>
                <td>
                    <a href="{{ route('weights.show', $weight) }}">
                        @if ($weight->date)
                            {{ date('d.m.Y', strtotime($weight->date)) }}
                        @endif
                    </a>
                </td>
                <td><a href="{{ route('weights.show', $weight) }}">{{ $weight->weight }}</a></td>
                <td><a href="{{ route('weights.show', $weight) }}">{{ $weight->left_triceps }}</a></td>
                <td><a href="{{ route('weights.show', $weight) }}">{{ $weight->right_triceps }}</a></td>
                <td><a href="{{ route('weights.show', $weight) }}">{{ $weight->waist }}</a></td>
                <td><a href="{{ route('weights.show', $weight) }}">{{ $weight->sides }}</a></td>
                <td><a href="{{ route('weights.show', $weight) }}">{{ $weight->ass }}</a></td>
                <td><a href="{{ route('weights.show', $weight) }}">{{ $weight->left_hip }}</a></td>
                <td><a href="{{ route('weights.show', $weight) }}">{{ $weight->right_hip }}</a></td>
                <td><a href="{{ route('weights.show', $weight) }}">{{ $weight->left_calf }}</a></td>
                <td><a href="{{ route('weights.show', $weight) }}">{{ $weight->right_calf }}</a></td>
                <td><a href="{{ route('weights.show', $weight) }}">{{ $weight->comment }}</a></td>
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
    <p><a href="{{ route('weights.create') }}?visitor={{ $vs }}" class="btn btn-success">Добавить измерение</a></p>

    <h2>Противопоказания</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Дата</th>
                <th>Противопоказания</th>
                <th>Комментарий</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($contraindication as $contrain)
            <tr>
                <td>
                    @if ($contrain->date)
                        {{ date('d.m.Y', strtotime($contrain->date)) }}
                    @endif
                </td>
                <td>{{ $contrain->value }}</td>
                <td>{{ $contrain->comment }}</td>
                <td>
                    @if (Auth::user()->isAdmin())
                        <form method="POST" action="{{ route('contraindication.destroy', $contrain) }}" class="mr-1">
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
    <p><a href="{{ route('contraindication.create') }}?visitor={{ $vs }}" class="btn btn-success">Добавить противопоказание</a></p>

    <h2>Массаж</h2>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Дата</th>
            <th>Мощность</th>
            <th>Продолжительность</th>
            <th>Комментарии</th>
            <th>Сотрудник</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($massage as $mass)
            <tr>
                <td><a href="{{ route('massage.show', $mass) }}">
                    @if ($mass->date)
                        {{ date('d.m.Y', strtotime($mass->date)) }}
                    @endif
                </a></td>
                <td><a href="{{ route('massage.show', $mass) }}">{{ $mass->power }}</a></td>
                <td><a href="{{ route('massage.show', $mass) }}">{{ $mass->length }}</a></td>
                <td><a href="{{ route('massage.show', $mass) }}">{{ $mass->comment }}</a></td>
                <td><a href="{{ route('massage.show', $mass) }}">{{ $mass->userName }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p><a href="{{ route('massage.create') }}?visitor={{ $vs }}" class="btn btn-success">Добавить Массаж</a></p>

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
            <th>Сотрудник</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($laserepilation as $laser)
            <tr>
                <td><a href="{{ route('laserepilation.show', $laser) }}">
                    @if ($laser->date)
                        {{ date('d.m.Y', strtotime($laser->date)) }}
                    @endif
                </a></td>
                <td><a href="{{ route('laserepilation.show', $laser) }}">{{ $laser->percent }}</a></td>
                <td><a href="{{ route('laserepilation.show', $laser) }}">{{ $laser->zone }}</a></td>
                <td><a href="{{ route('laserepilation.show', $laser) }}">{{ $laser->gc }}</a></td>
                <td><a href="{{ route('laserepilation.show', $laser) }}">{{ $laser->ms }}</a></td>
                <td><a href="{{ route('laserepilation.show', $laser) }}">{{ $laser->comment }}</a></td>
                <td><a href="{{ route('laserepilation.show', $laser) }}">{{ $laser->userName }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p><a href="{{ route('laserepilation.create') }}?visitor={{ $vs }}" class="btn btn-success">Добавить Лазерную эпиляцию</a></p>

    <h2>Криолиполиз</h2>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Дата</th>
            <th>Зона</th>
            <th>Комментарии</th>
            <th>Сотрудник</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cryolipoliz as $cryo)
            <tr>
                <td><a href="{{ route('cryolipoliz.show', $cryo) }}">
                    @if ($cryo->date)
                        {{ date('d.m.Y', strtotime($cryo->date)) }}
                    @endif
                </a></td>
                <td><a href="{{ route('cryolipoliz.show', $cryo) }}">{{ $cryo->zone }}</a></td>
                <td><a href="{{ route('cryolipoliz.show', $cryo) }}">{{ $cryo->comment }}</a></td>
                <td><a href="{{ route('cryolipoliz.show', $cryo) }}">{{ $cryo->userName }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p><a href="{{ route('cryolipoliz.create') }}?visitor={{ $vs }}" class="btn btn-success">Добавить Криолиполиз</a></p>

    <h2>RF лифтинг</h2>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Дата</th>
            <th>Живот</th>
            <th>Ягодицы</th>
            <th>Бедра</th>
            <th>Комментарии</th>
            <th>Сотрудник</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($rf as $r)
            <tr>
                <td><a href="{{ route('rf.show', $r) }}">
                    @if ($r->date)
                        {{ date('d.m.Y', strtotime($r->date)) }}
                    @endif
                </a></td>
                <td><a href="{{ route('rf.show', $r) }}">{{ $r->stomach }}</a></td>
                <td><a href="{{ route('rf.show', $r) }}">{{ $r->ass }}</a></td>
                <td><a href="{{ route('rf.show', $r) }}">{{ $r->hips }}</a></td>
                <td><a href="{{ route('rf.show', $r) }}">{{ $r->comment }}</a></td>
                <td><a href="{{ route('rf.show', $r) }}">{{ $r->userName }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p><a href="{{ route('rf.create') }}?visitor={{ $vs }}" class="btn btn-success">Добавить RF лифтинг</a></p>

    <h2>Ультразвуковая кавитация</h2>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Дата</th>
            <th>Живот</th>
            <th>Ягодицы</th>
            <th>Бедра</th>
            <th>Комментарии</th>
            <th>Сотрудник</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cavitation as $cavi)
            <tr>
                <td><a href="{{ route('cavitation.show', $cavi) }}">
                    @if ($cavi->date)
                        {{ date('d.m.Y', strtotime($cavi->date)) }}
                    @endif
                </a></td>
                <td><a href="{{ route('cavitation.show', $cavi) }}">{{ $cavi->stomach }}</a></td>
                <td><a href="{{ route('cavitation.show', $cavi) }}">{{ $cavi->ass }}</a></td>
                <td><a href="{{ route('cavitation.show', $cavi) }}">{{ $cavi->hips }}</a></td>
                <td><a href="{{ route('cavitation.show', $cavi) }}">{{ $cavi->comment }}</a></td>
                <td><a href="{{ route('cavitation.show', $cavi) }}">{{ $cavi->userName }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p><a href="{{ route('cavitation.create') }}?visitor={{ $vs }}" class="btn btn-success">Добавить Ультразвуковая кавитация</a></p>

    <h2>Миостимуляции</h2>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Дата</th>
            <th>Мощность</th>
            <th>Зона</th>
            <th>Программа</th>
            <th>Комментарии</th>
            <th>Сотрудник</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($miostimulation as $mio)
            <tr>
                <td><a href="{{ route('miostimulation.show', $mio) }}">
                    @if ($mio->date)
                        {{ date('d.m.Y', strtotime($mio->date)) }}
                    @endif
                </a></td>
                <td><a href="{{ route('miostimulation.show', $mio) }}">{{ $mio->power }}</a></td>
                <td><a href="{{ route('miostimulation.show', $mio) }}">{{ $mio->zone }}</a></td>
                <td><a href="{{ route('miostimulation.show', $mio) }}">{{ $mio->program }}</a></td>
                <td><a href="{{ route('miostimulation.show', $mio) }}">{{ $mio->comment }}</a></td>
                <td><a href="{{ route('miostimulation.show', $mio) }}">{{ $mio->userName }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p><a href="{{ route('miostimulation.create') }}?visitor={{ $vs }}" class="btn btn-success">Добавить Миостимуляцию</a></p>

@endsection
