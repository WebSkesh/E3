@extends('customers.dashboard')

@section('content')

    @include('errors')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <p />
                    <h3>
                        Створити клієнта
                    </h3>
                    <p />

                    <div class="form-group">

                        <input type="text" class="form-control" name="name" placeholder="Назва" value="{{ old('name') }}">
                        <br/>

                        <input type="password" class="form-control" name="password" placeholder="Пароль" value="">
                        <br/>

                        <input type="text" class="form-control" name="number_of_objects" placeholder="Максимальна к-ть обєктів" value="{{ old('number_of_objects') }}">
                        <br/>

                        <input type="text" class="form-control" name="email" placeholder="e-mail" value="{{ old('email') }}">
                        <br/>

                        <input type="text" class="form-control" name="phone" placeholder="Моб." value="{{ old('phone') }}">
                        <br/>

                        <input type="text" class="date form-control" name="started_at" placeholder="Дата підключення" value="{{ old('started_at') }}">
                        <br/>

                        <input type="text" class="date form-control" name="paid_to" placeholder="Оплачено до" value="{{ old('paid_to') }}">
                        <br/>

                        <input type="text" class="form-control" name="paid_all" placeholder="Оплачено всього" value="{{ old('paid_all') }}">
                        <br/>

                        <button class="btn btn-success">
                            <i class="glyphicon glyphicon-plus-sign"></i>
                            Створити
                        </button>
                        <a class="btn btn-default" href="{{ route('customers.index') }}">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            Відмінити
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('.date').datepicker({
            format: 'yyyy-mm-dd',
            viewMode: 'years',
            autoclose:true,
        });
    </script>

@endsection