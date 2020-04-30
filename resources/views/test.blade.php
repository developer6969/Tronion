<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Document</title>
</head>
<body>
    <h1>This is a simple document</h1>
    {{-- T1:C6 : Fetch some data from query string via route
    Also, send it to view and then display on page --}}
    <p>
        Following data is provided by test.blade.php file <br>
        <small>
            {{-- PHP within blade template --}}
            {{-- CASE A : this may lead to hack --}}
                <br><?= $name ?>
                    {{-- OR --}}
                <br>{!! $name !!}
            {{-- CASE B : Solution to HACK ALERT --}}
                <br><?= htmlspecialchars($name, ENT_QUOTES) ?>
                    {{-- OR --}}
                <br>{{ $name }}
        </small>
    </p>
</body>
</html>