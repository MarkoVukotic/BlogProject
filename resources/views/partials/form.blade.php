<div>
    <div><input type="text" name="title" id="" value="{{old('title', optional($post ?? null)->title)}}"></div>
    @error('title')
    <div>{{$message}}</div>
    @enderror
    <div><textarea name="content" id="" cols="30" rows="10">{{old('content', optional($post ?? null)->content)}}</textarea></div>
    @error('content')
    <div>{{$message}}</div>
    @enderror
</div>
