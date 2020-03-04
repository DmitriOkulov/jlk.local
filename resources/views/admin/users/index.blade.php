@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <p><a href="{{ route('admin.users.create') }}" class="btn btn-success">Добавить сотрудника</a></p>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Роль</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td><a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a></td>
                        <td><a href="{{ route('admin.users.show', $user) }}">{{ $user->email }}</a></td>

                        <td>
                            @if ($user->isAdmin())
                                <span class="badge badge-danger">Admin</span>
                            @else
                                <span class="badge badge-secondary">Пользователь</span>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    

@endsection