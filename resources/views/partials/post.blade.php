@if($post->trashed())
    <del>
        @endif
        <h3><a class="{{$post->trashed() ? 'text-muted' : ''}}"
               href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></h3>
        @if($post->trashed())
    </del>
@endif

@updated(['date' => $post->created_at, 'name' => $post->user->name])
@endupdated

@tags(['tags' => $post->tags])@endtags


<div class="mb-3">

    @can('update', $post)
        <a href="{{route('posts.edit', ['post' => $post->id])}}" class="btn btn-primary">Edit</a>
    @endcan

    @if(!$post->trashed())
        @can('delete', $post)
            <form class="d-inline" action="{{route('posts.destroy', ['post' => $post->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn-danger btn">
            </form>
        @endcan
    @endif
    @if($post->comments_count)
        <p>{{$post->comments_count}} comments</p>
    @else
        <p>No comments yet!</p>
    @endif

</div>
