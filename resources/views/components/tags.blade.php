<p>
    @foreach($tags as $tag)
        <a href="{{route('posts.tags.index',  $tag->id) }}" class="badge rounded-pill bg-success badge-lg"> {{$tag->name}} </a>
    @endforeach
</p>

