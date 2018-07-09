@extends('customers.dashboard')

@section('content')

    @include('errors')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('customers.update', $customer->id) }}" method="post" enctype="multipart/form-data">
                    <p />
                    <h3>
                        Редагувати клієнта
                    </h3>
                    <p />

                    <div class="form-group">

                        <input type="text" class="form-control" name="name" placeholder="Назва" value="{{ $customer->name  }}">
                        <br/>

                        <input type="text" class="form-control" name="city" placeholder="Початкове місто" value="{{ $customer->city }}">
                        <br/>

                        <input type="password" class="form-control" name="password" placeholder="Пароль" value="">
                        <br/>

                        <input type="text" class="form-control" name="number_of_objects" placeholder="Максимальна к-ть обєктів" value="{{ $customer->number_of_objects  }}">
                        <br/>

                        <input type="text" class="form-control" name="email" placeholder="e-mail" value="{{ $customer->email  }}">
                        <br/>

                        <input type="text" class="form-control" name="phone" placeholder="Моб." value="{{ $customer->phone  }}">
                        <br/>

                        <input type="text" class="date form-control" name="started_at" placeholder="Дата підключення" value="{{ $customer->started_at  }}">
                        <br/>

                        <input type="text" class="form-control" name="one_institution_price" placeholder="Ціна за 1 установу/місяць" value="{{ $customer->one_institution_price }}">
                        <br/>

                        <input type="text" class="date form-control" name="paid_to" placeholder="Оплачено до" value="{{ $customer->paid_to  }}">
                        <br/>

                        <input type="text" class="form-control" name="paid_all" placeholder="Оплачено всього" value="{{ $customer->paid_all  }}">
                        <br/>

                        <input type="hidden" name="id" value="{{ $customer->id }}">
                        <button class="btn btn-warning">
                            <i class="glyphicon glyphicon-floppy-disk"></i>
                            Зберегти
                        </button>
                        <a class="btn btn-default" href="{{ route('customers.index') }}">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            Відмінити
                        </a>
                    </div>
                    {{ csrf_field() }}
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