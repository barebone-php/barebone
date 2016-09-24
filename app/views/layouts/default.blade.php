<html>
<head>
    <meta charset="utf-8">
    <title>{{ \Barebone\Config::read('app.name') }}</title>
    <meta name="viewport" content="width=device-width">
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <div id="header">
        <h1><a href="/">{{ \Barebone\Config::read('app.name') }}</a></h1>
    </div>
    <div id="content">
        @yield('content')
    </div>
</div>

<script src="/js/app.js"></script>
</body>
</html>