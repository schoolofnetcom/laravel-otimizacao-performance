@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Listagem de posts</h3>
        {{$posts->links()}}
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Categorias</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->categories->implode('name', ', ') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$posts->links()}}
    </div>
@endsection
