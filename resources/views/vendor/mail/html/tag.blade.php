@php
    $variant = $variant ?? 'dark';
    $background = config("enso.mails.colors.{$variant}", config('enso.mails.components.tag.background'));
    $text = in_array($variant, ['light', 'warning'], true)
        ? config('enso.mails.text.heading')
        : config('enso.mails.components.tag.text');
@endphp

<span style="background: {{ $background }}; border-radius: 5px; color: {{ $text }}; display: inline-block; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace; font-size: 12px; font-weight: 700; line-height: 1.4; margin: 0 0 12px; padding: 3px 10px;">
{{ $slot }}
</span>
