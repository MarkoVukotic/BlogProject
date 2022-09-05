<div class="form-group">
    <div>
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{old('title', optional($post ?? null)->title)}}"></div>
    @error('title')
    <div class="alert alert-danger  mt-2">{{$message}}</div>
    @enderror
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" class="form-control" rows="10">{{old('content', optional($post ?? null)->content)}}</textarea></div>
    @error('content')
    <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror
</div>
