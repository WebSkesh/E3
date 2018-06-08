@extends('adminlte::master')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Енергобаланс</title>
</head>
<body class="welcome_body">
    <div class="container">
        <div class="row text-center">

            <div class="col-md-12">
                <img src="{{url('/img/title.png')}}" alt="Image"/>
            </div>

            <h2>
                <b>Енергобаланс</b>
            </h2>
            <h5>
               <b>Використовуй енергію розумно!</b> <br />
                Система щоденного моніторингу споживання енергоносіїв {{ $customer->name }}
            </h5>

            <p style="padding-top: 30px;" />

            <a class="btn btn-primary" href="{{ route('enterData') }}">
                <i class="glyphicon glyphicon-save"></i>
                Ввести дані
            </a>

            <a class="btn btn-success" href="{{ route('analysis') }}">
                <i class="glyphicon glyphicon-eye-open"></i>
                Аналіз даних
            </a>

            <a class="btn btn-warning" href="{{ route('admin') }}">
                <i class="glyphicon glyphicon glyphicon-cog"></i>
                Адміністрування
            </a>

            <p /><a href="{{ url("/") }}">На головну</a>

            <p style="padding-top: 20px;" />



            <p />
            © Розробка: <br/>
            Сакалюк Д.C. тел.: +380967848377, e-mail: detton1@ukr.net<br/>
            Чорний П.І. тел.:+380969137678, e-mail: skesh@ukr.net<br/>
            Всі права захищено<br/>

            <a target="_blank" title="http://energobalans.com/" href="http://energobalans.com/">www.energobalans.com</a>

        </div>
    </div>
</body>
</html>