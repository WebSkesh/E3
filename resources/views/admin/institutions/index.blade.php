@extends('admin.dashboard')

@section('content')

    <div class="container">
        <div class="row">

            <form action="{{ route('admin.institutions.index') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        {{ Form::label('city_id', trans('messages.filter')." ".trans_choice('messages.city', 0)) }}:
                        <select name="city_id" class="form-control" id="city_id" onchange="this.form.submit()">
                            <option value="">{{ trans('messages.all') }}</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" {{ $city->id == $city_id ? "selected" : NULL }} >{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        {{ Form::label('category_id', trans('messages.filter')." ".trans_choice('messages.category', 0)) }}:
                        <select name="category_id" class="form-control" id="category_id" onchange="this.form.submit()">
                            <option value="">{{ trans('messages.all') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $category_id ? "selected" : NULL }} >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>

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
                            <th>{{ trans_choice('messages.city', 0) }}</th>
                            <th>{{ trans_choice('messages.category', 0) }}</th>
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
                                    <a href="{{ route('admin.institutions.edit', $institution->id) }}" class="text text-warning">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    @if(!\App\Models\Institution::isManagement($institution->id))
                                    <a href="{{ route('admin.institutions.delete', $institution->id) }}" class="text text-danger" onclick="return confirm('Are you sure?') ? true : false;">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </a>
                                    @endif
                                </td>

                                <td>{{ $institution->name }}</td>
                                <td>{{ $institution->city->name}}</td>
                                <td>{{ $institution->category->name }}</td>
                                <td>{{ $institution->email }}</td>
                                <td>{{ $institution->phone }}</td>
                                <td>{{ $institution->contact_person }}</td>
                                <td>{{ $institution->created_at->format('d.m.Y H:i') }}</td>
                                <td>{{ $institution->updated_at->format('d.m.Y H:i') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection