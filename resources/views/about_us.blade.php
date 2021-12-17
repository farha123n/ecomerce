<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>ABOUT US PAGE</h2>
    <h4>{{ $description }}</h4>

    <ul>
    	@foreach($weburl as $key => $val)
    	<li><a target="_blank" href="{{ $val }}">{{ $key }}</a></li>
    	@endforeach
    </ul>
</body>
</html>