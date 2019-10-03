@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Listagem de usuários</h3>
        {{$users->links()}}
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Último post</th>
                <th>Total de posts</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->last_post }}</td>
                    <td>{{ $user->posts_count }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    </div>
@endsection
