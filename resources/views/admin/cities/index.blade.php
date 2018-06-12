@extends('admin.dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <p />
                <h3>
                    {{ trans('messages.city') }} / {{ trans('messages.village') }}
                    <a href="{{ route('admin.cities.create') }}" class="btn btn-success">
                        <i class="glyphicon glyphicon-plus-sign"></i>
                        {{ trans('messages.create') }}
                    </a>
                </h3>
                <p />

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Назва</th>
                            <th>E-mail</th>
                            <th>Моб.</th>
                            <th>Контактна особа</th>
                            <th>Створено</th>
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
                                <td>{{ $city->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection