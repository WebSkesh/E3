@extends('admin.dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <p />
                <h3>
                    <a href="{{ route('admin.cities.create') }}" class="btn btn-success">
                        <i class="glyphicon glyphicon-plus-sign"></i>
                        {{ trans('messages.create') }}
                    </a>

                    {{ trans_choice('messages.city', 1) }} / {{ trans_choice('messages.village', 1) }}
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
                        @foreach($cities as $city)
                            <tr>
                                <td>
                                    {{--<a href="{{ route('customers.view', $customer->id) }}">--}}
                                    {{--<i class="glyphicon glyphicon-eye-open"></i>--}}
                                    {{--</a>--}}
                                    <a href="{{ route('admin.cities.edit', $city->id) }}" class="text text-warning">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.cities.delete', $city->id) }}" class="text text-danger" onclick="return confirm('Are you sure?') ? true : false;">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </a>
                                </td>

                                <td>{{ $city->name }}</td>
                                <td>{{ $city->email }}</td>
                                <td>{{ $city->phone }}</td>
                                <td>{{ $city->contact_person }}</td>
                                <td>{{ $city->created_at->format('d.m.Y H:i') }}</td>
                                <td>{{ $city->updated_at->format('d.m.Y H:i') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection