<h4>Arquivo</h4>
<ul class="list-group">
    @foreach($archive as $item)
    <li class="list-group-item">
        <a class="d-block" href="/posts/?month={{ $item->month }}&year={{ $item->year }}">
            {{ $item->month }}/{{ $item->year }} ({{ $item->number }})
        </a>
    </li>
    @endforeach
</ul>
