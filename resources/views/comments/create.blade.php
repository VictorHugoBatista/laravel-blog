<div>
    <form action="/comments/{{ $post->id }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title" class="control-label">
                Assunto do comentario
            </label>
            <input type="text" id="subject" class="form-control"
                name="subject" autofocus />
        </div>
    
        <div class="form-group">
            <label for="body" class="control-label">
                Corpo do comentario
            </label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
        </div>
    
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">
                Register
            </button>
        </div>
    </form>
</div>
