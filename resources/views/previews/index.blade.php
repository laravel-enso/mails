<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Enso Mail Previews</title>
    <style>
        body {
            background: #eef3f8;
            color: #202938;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            margin: 0;
            padding: 40px;
        }

        .enso-mails-preview {
            margin: 0 auto;
            max-width: 720px;
        }

        .enso-mails-preview__title {
            font-size: 24px;
            margin: 0 0 24px;
        }

        .enso-mails-preview__link {
            background: #ffffff;
            border: 1px solid #e1e8f0;
            border-radius: 10px;
            color: #202938;
            display: block;
            font-weight: 700;
            margin-bottom: 10px;
            padding: 14px 16px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <main class="enso-mails-preview">
        <h1 class="enso-mails-preview__title">Laravel Enso Mail Previews</h1>

        @foreach($previews as $preview)
            <a class="enso-mails-preview__link" href="{{ route('enso-mails-preview.show', $preview->key()) }}" target="_blank" rel="noopener">
                {{ $preview->name() }}
            </a>
        @endforeach
    </main>
</body>
</html>
