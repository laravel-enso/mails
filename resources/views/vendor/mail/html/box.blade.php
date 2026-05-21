@php
    $variant = $variant ?? 'neutral';
    $background = $variant === 'neutral'
        ? config('enso.mails.components.box.background')
        : config("enso.mails.colors.{$variant}", config('enso.mails.components.box.background'));
    $text = in_array($variant, ['dark', 'primary', 'link', 'info', 'success', 'danger'], true)
        ? config('enso.mails.colors.white')
        : config('enso.mails.text.body');
    $radius = config('enso.mails.layout.radius') + 6;
    $body = Illuminate\Mail\Markdown::parse($slot)->toHtml();

    if ($variant !== 'neutral') {
        $body = preg_replace(
            '/<p>/',
            '<p style="color: '.$text.'; font-weight: 500;">',
            $body,
        );

        $body = preg_replace(
            '/<li>/',
            '<li style="color: '.$text.'; font-weight: 500;">',
            $body,
        );
    }
@endphp

<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background: {{ $background }}; border: 1px solid {{ config('enso.mails.components.box.border') }}; border-radius: {{ $radius }}px; margin: 18px 0; overflow: hidden;">
<tr>
<td style="color: {{ $text }}; padding: {{ $padding ?? '16px 18px' }};">
@isset($title)
<p style="color: {{ $text }}; font-size: 11px; font-weight: 700; letter-spacing: .08em; margin: 0 0 8px; text-transform: uppercase;">
{{ $title }}
</p>
@endisset
{!! $body !!}
</td>
</tr>
</table>
