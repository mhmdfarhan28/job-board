<nav {{ $attributes }}>
    <ul class="flex space-x-4 text-slate-700 font-semibold">
        <li>
            <a href="/">Home</a>
        </li>
        @foreach ($links as $label => $link)
            <li>
                →
            </li>
            <li>
                <a href="{{ $link }}">{{ $label }}</a>
            </li>
        @endforeach
    </ul>
</nav>
