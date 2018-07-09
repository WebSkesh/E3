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
                        {{ trans('messages.create') }} {{ trans_choice('messages.city', 0) }} / {{ trans_choice('messages.village', 0) }}
                    </h3>
                    <p />

                    <div class="form-group">

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

@endsection