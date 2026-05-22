@component('mail::report')
@component('mail::title', ['subtitle' => 'A wide layout for internal summaries and operational tables.'])
System report
@endcomponent

@component('mail::table')
| Area | Count | Notes |
| :-- | :-- | :-- |
@foreach($rows as $row)
| {{ $row[0] }} | {{ $row[1] }} | {{ $row[2] }} |
@endforeach
@endcomponent

@component('mail::file', ['meta' => '24 KB', 'url' => 'https://example.com/files/system-report.xlsx'])
system-report.xlsx
@endcomponent
@endcomponent
