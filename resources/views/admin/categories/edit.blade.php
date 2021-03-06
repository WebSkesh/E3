@extends('customers.dashboard')

@section('content')

    @include('errors')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('admin.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <p />
                    <h3>
                        {{ trans('messages.edit') }} {{ trans_choice('messages.category', 1) }}
                    </h3>
                    <p />

                    <div class="form-group">
                        {{ Form::label('name', trans('messages.name')) }}:
                        <input type="text" class="form-control" name="name" id="name" value="{{ $category->name  }}">
                        <br/>

                        <button class="btn btn-warning">
                            <i class="glyphicon glyphicon-floppy-disk"></i>
                            {{ trans('messages.save') }}
                        </button>
                        <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
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