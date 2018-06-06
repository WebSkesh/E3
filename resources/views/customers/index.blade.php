@extends('customers.dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <p />
                <h3>
                    Клієнти
                    <a href="{{ route('customers.create') }}" class="btn btn-success">+ Створити</a>
                </h3>
                <p />

                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Назва</th>
                        <th>К-ть обєктів максимальна</th>
                        <th>К-ть обєктів поточна</th>
                        <th>e-mail</th>
                        <th>Моб.</th>
                        <th>Дата підключення</th>
                        <th>Сплачено до</th>
                        <th>Сплачено всього</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->number_of_objects }}</td>
                            <td>К-ть обєктів поточна</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->number_of_objects }}</td>
                            <td>{{ $customer->paid_to }}</td>
                            <td>{{ $customer->paid_all }}</td>
                            <td>
                                {{--<a href="{{ route('customers.view', $customer->id) }}">--}}
                                    {{--<i class="glyphicon glyphicon-eye-open"></i>--}}
                                {{--</a>--}}
                                <a href="{{ route('customers.edit', $customer->id) }}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a href="{{ route('customers.delete', $customer->id) }}" onclick="confirm('Are you sure?')">
                                    <i class="glyphicon glyphicon-remove"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection