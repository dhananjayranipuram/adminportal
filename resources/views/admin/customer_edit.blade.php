@extends('layouts.admin')

@section('content')

<h2 style="text-align: center;">Edit Customer</h2>

<form id="editCustomerForm">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $customer->id }}">
    <label>Name:</label>
    <input type="text" name="name" id="name" value="{{ $customer->name }}" required><br>

    <label>Phone:</label>
    <input type="text" name="phone" phone="phone" value="{{ $customer->phone }}"><br>

    <label>Email:</label>
    <input type="email" name="email" id="email" value="{{ $customer->email }}"><br>

    <label>Address:</label>
    <textarea name="address" id="address">{{ $customer->address }}</textarea><br>

    <button type="submit">Update</button>
</form>

<div id="message"></div>
<script src="{{ asset('assets/js/customer_edit.js') }}"></script>

@endsection