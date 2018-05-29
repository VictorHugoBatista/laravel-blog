<form action="{{ $action }}" method="POST">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="title" class="control-label">
            Título do post
        </label>
        <input type="text" id="title" class="form-control"
            name="title" autofocus value="{{ isset($post) ? $post->title : '' }}" />
    </div>

    <div class="form-group">
        <label for="content" class="control-label">
            Corpo do post
        </label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ isset($post) ? $post->content : '' }}</textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            Register
        </button>
    </div>
</form>
