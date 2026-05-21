<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Enso Mail Previews</title>
    <style>
        body {
            background: #f4f7fb;
            color: #111827;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            margin: 0;
            padding: 32px;
        }

        main {
            margin: 0 auto;
            max-width: 760px;
        }

        h1 {
            font-size: 24px;
            margin: 0 0 24px;
        }

        a {
            background: #ffffff;
            border: 1px solid #d9e2ec;
            border-radius: 8px;
            color: #155eef;
            display: block;
            margin-bottom: 12px;
            padding: 16px 18px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <main>
        <h1>Laravel Enso Mail Previews</h1>

        @foreach($previews as $preview)
            <a href="{{ route('enso-mails-preview.show', $preview->key()) }}" target="_blank" rel="noopener">
                {{ $preview->name() }}
            </a>
        @endforeach
    </main>
</body>
</html>
