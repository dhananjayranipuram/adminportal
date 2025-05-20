@extends('layouts.admin')

@section('content')

<h2 style="text-align: center;">Create Customer</h2>
@if(request('success'))
    <div class="alert alert-success">
        {{ request('success') }}
    </div>
@endif
<form id="customerForm">
    <label>Name*:</label>
    <input type="text" name="name" required><br><br>

    <label>Phone:</label>
    <input type="text" name="phone"><br><br>

    <label>Email:</label>
    <input type="email" name="email"><br><br>

    <label>Address:</label>
    <textarea name="address"></textarea><br><br>

    <button type="submit">Submit</button>
</form>

<div id="message"></div>
<script src="{{ asset('assets/js/add_customers.js') }}?v={{ time() }}"></script>

@endsection