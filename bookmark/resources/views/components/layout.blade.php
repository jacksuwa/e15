<!doctype html>
<html lang='en'>

<head>
    <title>{{ $title ?? 'Bookmark' }}</title>
    <meta charset='utf-8'>
    <link href='/css/bookmark.css' type='text/css' rel='stylesheet'>
</head>

<body>

    {{ $header }}

    <section>
        {{ $slot }}
    </section>

    <footer>
        &copy; Bookmark, Inc.
    </footer>

</body>

</html>
