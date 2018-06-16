@extends('admin.dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <p />
                <h3>
                    <a href="{{ route('admin.institutions.create') }}" class="btn btn-success">
                        <i class="glyphicon glyphicon-plus-sign"></i>
                        {{ trans('messages.create') }}
                    </a>

                    {{ trans_choice('messages.institution', 2) }}
                </h3>
                <p />

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>{{ trans('messages.name') }}</th>
                            <th>{{ trans('messages.email') }}</th>
                            <th>{{ trans('messages.mob') }}</th>
                            <th>{{ trans('messages.contactPerson') }}</th>
                            <th>{{ trans('messages.created') }}</th>
                            <th>{{ trans('messages.updated') }}</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($institutions as $institution)
                            <tr>
                                <td>
                                    {{--<a href="{{ route('customers.view', $customer->id) }}">--}}
                                    {{--<i class="glyphicon glyphicon-eye-open"></i>--}}
                                    {{--</a>--}}
                                    <a href="{{ route('admin.cities.edit', $institution->id) }}" class="text text-warning">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.cities.delete', $institution->id) }}" class="text text-danger" onclick="return confirm('Are you sure?') ? true : false;">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </a>
                                </td>

                                <td>{{ $institution->name }}</td>
                                <td>{{ $institution->email }}</td>
                                <td>{{ $institution->phone }}</td>
                                <td>{{ $institution->contact_person }}</td>
                                <td>{{ $institution->created_at }}</td>
                                <td>{{ $institution->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection