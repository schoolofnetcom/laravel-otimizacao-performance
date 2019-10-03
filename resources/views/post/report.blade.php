<ul>
    @foreach($posts as $post)
        <li>
            Titulo: {{$post->title}} <br><br>
            Conteudo: {{$post->content}}
        </li>
    @endforeach
</ul>
