@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary mr-1">Редактировать</a>

        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Удалить</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tr>
            <th>Имя</th><td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th><td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Роль</th>
            <td>
                @if ($user->isAdmin())
                    <span class="badge badge-danger">Admin</span>
                @else
                    <span class="badge badge-secondary">Пользователь</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>Статистика за ноябрь</th>
            <td>
                @foreach ($zones as $key => $zone)
                    {{ $key }}: {{ $zone }}<br>
                @endforeach
            </td>
        </tr>
    </table>

@endsection
