<h4>Tags</h4>
<ul class="list-group">
    @foreach($tags as $item)
    <li class="list-group-item">
        <a class="d-block" href="/tags/{{ $item->title }}">
            {{ $item->title }}
        </a>
    </li>
    @endforeach
</ul>
