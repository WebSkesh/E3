@extends('customers.dashboard')

@section('content')

    @include('errors')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('admin.institutions.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <p />
                    <h3>
                        {{ trans('messages.create') }} {{ trans_choice('messages.institution', 1) }}
                    </h3>
                    <p />

                    <div class="form-group">

                        <div class="form-group">
                            {{ Form::label('city_id', trans_choice('messages.city', 0)) }}:
                            <select name="city_id" class="form-control" id="city_id">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{ Form::label('category_id', trans_choice('messages.category', 0)) }}:
                            <select name="category_id" class="form-control" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{ Form::label('name', trans('messages.name')) }}:
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        <br/>

                        {{ Form::label('email', trans('messages.email')) }}:
                        <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                        <br/>

                        {{ Form::label('phone', trans('messages.mob')) }}:
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                        <br/>

                        {{ Form::label('contact_person', trans('messages.contactPerson')) }}:
                        <input type="text" class="form-control" name="contact_person" id="contact_person" value="{{ old('contact_person') }}">
                        <br/>

                        {{ Form::label('password', trans('messages.password')) }}:
                        <input type="password" class="form-control" name="password" id="password" value="">
                        <br/>

                        <button class="btn btn-success">
                            <i class="glyphicon glyphicon-plus-sign"></i>
                            {{ trans('messages.create') }}
                        </button>
                        <a class="btn btn-default" href="{{ route('admin.institutions.index') }}">
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