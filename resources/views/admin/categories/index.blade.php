@extends('admin.dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <p />
                <h3>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-success">
                        <i class="glyphicon glyphicon-plus-sign"></i>
                        {{ trans('messages.create') }}
                    </a>

                    {{ trans_choice('messages.category', 2) }}
                </h3>
                <p />

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>{{ trans('messages.name') }}</th>
                            <th>{{ trans('messages.created') }}</th>
                            <th>{{ trans('messages.updated') }}</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{--<a href="{{ route('customers.view', $customer->id) }}">--}}
                                    {{--<i class="glyphicon glyphicon-eye-open"></i>--}}
                                    {{--</a>--}}

                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="text text-warning">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.categories.delete', $category->id) }}" class="text text-danger" onclick="return confirm('Are you sure?') ? true : false;">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </a>
                                </td>

                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at->format('d.m.Y H:i') }}</td>
                                <td>{{ $category->updated_at->format('d.m.Y H:i') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection