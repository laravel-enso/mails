<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Enso Mail Previews</title>
    <style>
        .enso-mails-preview-page {
            background: #eef3f8;
            color: #202938;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            margin: 0;
            padding: 40px;
        }

        .enso-mails-preview-page__main {
            margin: 0 auto;
            max-width: 1180px;
        }

        .enso-mails-preview__title {
            font-size: 24px;
            margin: 0 0 24px;
        }

        .enso-mails-preview__section {
            margin-top: 30px;
        }

        .enso-mails-preview__section:first-of-type {
            margin-top: 0;
        }

        .enso-mails-preview__section-title {
            font-size: 16px;
            margin: 0 0 12px;
        }

        .enso-mails-preview__grid {
            display: grid;
            gap: 12px;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        }

        .enso-mails-preview__link {
            background: #ffffff;
            border: 1px solid #e1e8f0;
            border-radius: 10px;
            color: #202938;
            display: block;
            font-weight: 700;
            padding: 14px 16px;
            text-decoration: none;
        }

        .enso-mails-preview__meta {
            color: #748195;
            display: block;
            font-size: 12px;
            font-weight: 600;
            line-height: 1.35;
            margin-top: 8px;
            overflow-wrap: anywhere;
        }
    </style>
</head>
<body class="enso-mails-preview-page">
    <main class="enso-mails-preview-page__main">
        <h1 class="enso-mails-preview__title">Laravel Enso Mail Previews</h1>

        @foreach($sections as $section)
            <section class="enso-mails-preview__section">
                <h2 class="enso-mails-preview__section-title">{{ $section['name'] }}</h2>

                <div class="enso-mails-preview__grid">
                    @foreach($section['previews'] as $preview)
                        <a class="enso-mails-preview__link" href="{{ route('enso-mails-preview.show', $preview->key()) }}" target="_blank" rel="noopener">
                            {{ $preview->name() }}
                            <span class="enso-mails-preview__meta">{{ $preview->key() }}</span>
                            <span class="enso-mails-preview__meta">{{ $preview->view() }}</span>
                        </a>
                    @endforeach
                </div>
            </section>
        @endforeach
    </main>
</body>
</html>
