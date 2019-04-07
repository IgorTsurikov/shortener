<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shortener</title>
</head>
<body>
<form method="POST" action="/store">
    @csrf
    Origin url <input type="text" name="origin_url">
    <input type="submit">
</form>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('message'))
    <div>
        short url: <a href="{{ session()->get('message') }}" target="_blank">{{ session()->get('message') }}</a>
    </div>
@endif

</body>
</html>
