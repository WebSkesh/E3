@extends('adminlte::master')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('messages.energybalance') }} {{ $customer->name }}</title>
    <meta name="keywords" content="{{ trans('messages.energybalance') }}, {{ $customer->name }}">
    <meta name="description" content="{{ trans('messages.dailySystemMonitoring') }} {{ trans('messages.energybalance') }} {{ $customer->name }}">
</head>
<body class="welcome_body">
    <div class="container">
        <div class="row text-center">

            <div class="col-md-12">
                <img src="{{url('/img/title.png')}}" alt="Image"/>
            </div>

            <h2>
                <b>{{ trans('messages.energybalance') }}</b>
            </h2>
            <h5>
               <b>{{ trans('messages.useEnergyWisely') }}</b> <br />
                {{ trans('messages.dailySystemMonitoring') }} {{ $customer->name }}
            </h5>

            <p style="padding-top: 30px;" />

            <a class="btn btn-primary" href="{{ route('enterData') }}">
                <i class="glyphicon glyphicon-save"></i>
                {{ trans('messages.enterData') }}
            </a>

            <a class="btn btn-success" href="{{ route('analysis') }}">
                <i class="glyphicon glyphicon-eye-open"></i>
                {{ trans('messages.analysis') }}
            </a>

            <a class="btn btn-warning" href="{{ route('admin') }}">
                <i class="glyphicon glyphicon glyphicon-cog"></i>
                {{ trans('messages.admin') }}
            </a>

            <p /><a href="{{ url("/") }}">{{ trans('messages.toMain') }}</a>

            <p style="padding-top: 20px;" />



            <p />
            © {{ trans('messages.developed') }}: <br/>
            {{ trans('messages.sakalyuk') }}<br/>
            {{ trans('messages.chornyi') }}<br/>
            {{ trans('messages.allRightsReserved') }}<br/>

            <a target="_blank" title="http://energobalans.com/" href="http://energobalans.com/">www.energobalans.com</a>
        </div>
    </div>
</body>
</html>