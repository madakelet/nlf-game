<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meghívó</title>
</head>
<body>
    <h1>Meghívó</h1>
    <p>Szia uram!</p>
    <p>Az alábbi linken tudod elfogadni a meghívást:</p>
        <a href="{{ $url }}">Elfogadás</a>
    <p>Üdvözlettel,</p>
    <p>Jack és Telek</p>
    <small>Ha nem tudod megnyitni a linket valamiért, akkor ezt másold be a bögészőbe: {{ $url }}</small>
</body>
</html>