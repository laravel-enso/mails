@php
    $width = $width ?? config('enso.mails.layout.width');
@endphp

<!doctype html>
<html lang="und" dir="auto" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>{{ config('enso.mails.brand.name') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        @media only screen and (max-width: 480px) {
            .enso-mail-frame { padding: 32px 0 48px !important; }
            .enso-mail-card { width: calc(100% - 12px) !important; }
            .enso-mail-content-cell { padding: 30px 18px 24px !important; }
            .enso-mail-header-left,
            .enso-mail-header-right { padding: 22px 18px !important; }
            .enso-mail-footer-cell { padding-left: 18px !important; padding-right: 18px !important; }
            .button { width: 100% !important; }
        }
    </style>
</head>
<body style="background-color: {{ config('enso.mails.layout.background') }}; margin: 0; padding: 0; width: 100% !important;">
    <div style="display: none; font-size: 1px; color: #ffffff; line-height: 1px; max-height: 0; max-width: 0; opacity: 0; overflow: hidden;">
        {{ config('enso.mails.brand.name') }}
    </div>

    <div class="enso-mail-frame" aria-label="{{ config('enso.mails.brand.name') }}" aria-roledescription="email" role="article" lang="und" dir="auto" style="background-color: {{ config('enso.mails.layout.background') }}; padding: 56px 0 80px;">
        <div class="enso-mail-card" style="background: {{ config('enso.mails.layout.surface') }}; background-color: {{ config('enso.mails.layout.surface') }}; border-radius: {{ config('enso.mails.layout.card_radius') }}px; box-shadow: 0 20px 48px rgba(32, 41, 56, .13), 0 2px 8px rgba(32, 41, 56, .06); margin: 0 auto; max-width: {{ $width }}px; overflow: hidden; width: calc(100% - 32px);">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background: {{ config('enso.mails.layout.surface') }}; background-color: {{ config('enso.mails.layout.surface') }}; border: 1px solid {{ config('enso.mails.layout.border') }}; border-collapse: separate; border-radius: {{ config('enso.mails.layout.card_radius') }}px; overflow: hidden; width: 100%;" width="100%">
                <tr>
                    <td style="padding: 0; text-align: center;">
                        {{ $header ?? '' }}

                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background: {{ config('enso.mails.layout.surface') }}; background-color: {{ config('enso.mails.layout.surface') }}; width: 100%;" width="100%">
                            <tr>
                                <td class="enso-mail-content-cell" style="color: {{ config('enso.mails.text.body') }}; font-family: {!! config('enso.mails.text.font_family') !!}; font-size: 14px; line-height: 1.65; padding: 28px 30px 24px; text-align: left;">
                                    {{ Illuminate\Mail\Markdown::parse($slot) }}

                                    {{ $subcopy ?? '' }}
                                </td>
                            </tr>
                        </table>

                        {{ $footer ?? '' }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
