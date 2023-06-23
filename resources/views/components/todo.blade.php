<html>
<head>
    <title>{{ $title ?? 'Todo Manager' }}</title>
</head>
<body>
    <h1>{{ $name1 ?? ''  }}</h1>
<h1>Todos</h1>
<hr/>
{{ $slot }}
</body>
</html>
