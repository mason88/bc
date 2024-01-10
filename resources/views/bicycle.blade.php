<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bicycle</title>
        <style>
            div { padding:0.5em; }
        </style>
    </head>
    <body>
        <h1>Ride Bicycle</h1>

        <div>Direction: {{ $direction }}</div>
        <div>Speed: {{ $speed }} MPH</div>

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('bicycle.ride') }}">
            @csrf

            <div>
                <button type="submit" name="action" value="left">Turn Left</button>
                <button type="submit" name="action" value="right">Turn Right</button>
            </div>
            <div>
                <button type="submit" name="action" value="pedal">Pedal</button>
                <button type="submit" name="action" value="brake">Brake</button>
            </div>
        </form>
    </body>
</html>
