<div style="margin: 0 0 10px;">
<h1 style="color: {{ config('enso.mails.text.heading') }}; font-size: {{ $size ?? 21 }}px; font-weight: 700; line-height: 1.28; margin: 0 0 8px;">
{{ $slot }}
</h1>
@isset($subtitle)
<p style="color: {{ config('enso.mails.text.muted') }}; font-size: 14px; line-height: 1.6; margin: 0;">
{{ $subtitle }}
</p>
@endisset
</div>
