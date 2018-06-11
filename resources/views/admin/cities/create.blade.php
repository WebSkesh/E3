@extends('customers.dashboard')

@section('content')

    @include('errors')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('admin.cities.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <p />
                    <h3>
                        {{ trans('messages.create') }} {{ trans('messages.city') }}
                    </h3>
                    <p />

                    <div class="form-group">

                        <input type="text" class="form-control" name="name" placeholder="Назва" value="{{ old('name') }}">
                        <br/>

                        <input type="text" class="form-control" name="email" placeholder="e-mail" value="{{ old('email') }}">
                        <br/>

                        <input type="text" class="form-control" name="phone" placeholder="Моб." value="{{ old('phone') }}">
                        <br/>

                        <input type="text" class="form-control" name="contact_person" placeholder="Контактна особа" value="{{ old('contact_person') }}">
                        <br/>

                        <input type="password" class="form-control" name="password" placeholder="Пароль" value="">
                        <br/>

                        <button class="btn btn-success">
                            <i class="glyphicon glyphicon-plus-sign"></i>
                            {{ trans('messages.create') }}
                        </button>
                        <a class="btn btn-default" href="{{ route('admin.cities.index') }}">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            {{ trans('messages.cancel') }}
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