{{ $slot }} {{ isset($meta) ? "({$meta})" : '' }}
@isset($url)
{{ $url }}
@endisset
