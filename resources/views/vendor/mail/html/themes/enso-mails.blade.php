body,
body *:not(html):not(style):not(br):not(tr):not(code) {
    box-sizing: border-box;
    font-family: {!! config('enso.mails.text.font_family') !!};
}

body {
    background-color: {{ config('enso.mails.layout.background') }};
    color: {{ config('enso.mails.text.body') }};
    margin: 0;
    width: 100% !important;
    -webkit-text-size-adjust: none;
}

a {
    color: {{ config('enso.mails.colors.link') }};
}

p {
    color: {{ config('enso.mails.text.body') }};
    font-size: 14px;
    line-height: 1.5;
    margin: 0 0 8px !important;
    text-align: left;
}

img {
    max-width: 100%;
}

.table {
    border: 1px solid {{ config('enso.mails.components.table.border') }};
    border-radius: 12px;
    overflow: hidden;
}

.table table {
    border-collapse: collapse;
    width: 100%;
}

.table th {
    background: {{ config('enso.mails.components.table.head') }};
    border-bottom: 1px solid {{ config('enso.mails.components.table.border') }};
    color: {{ config('enso.mails.text.muted') }};
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .08em;
    padding: 9px 12px;
    text-align: left;
    text-transform: uppercase;
}

.table td {
    border-bottom: 1px solid {{ config('enso.mails.components.table.border') }};
    color: {{ config('enso.mails.text.body') }};
    font-size: 13px;
    padding: 9px 12px;
    vertical-align: top;
}
