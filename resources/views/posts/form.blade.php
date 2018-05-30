<form action="{{ $action }}" method="POST">
    {{ csrf_field() }}
    @if (isset($method) && '' !== $method)
    {{ method_field($method) }}
    @endif

    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label for="title" class="control-label">
            Título do post
        </label>
        <input type="text" id="title" class="form-control"
            name="title" autofocus value="{{ isset($post) ? $post->title : '' }}" />
        @if ($errors->has('title'))
        <span class="text-danger">
            {{ $errors->first('title') }}
        </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
        <label for="content" class="control-label">
            Corpo do post
        </label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ isset($post) ? $post->content : '' }}</textarea>
        @if ($errors->has('content'))
        <span class="text-danger">
            {{ $errors->first('content') }}
        </span>
        @endif
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            Register
        </button>
    </div>
</form>
