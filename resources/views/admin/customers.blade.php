@extends('layouts.admin')

@section('content')

<h1>Customer List</h1>
    <div><a style="padding-right: 10px;" href="{{ url('/add-customer') }}">Add New Customer</a></div>
    <table border="1" cellpadding="8" id="customerTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <script src="{{ asset('assets/js/customers.js') }}"></script>
    


@endsection