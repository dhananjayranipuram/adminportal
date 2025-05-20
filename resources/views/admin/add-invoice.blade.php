@extends('layouts.admin')

@section('content')
<h2 style="text-align: center;">Create Invoice</h2>

<form id="invoiceForm">
    <label for="customer_id">Customer</label>
    <select id="customer_id" name="customer_id" required>
        <option value="">Select Customer</option>
        <!-- Customers will be populated here -->
    </select>

    <label for="date">Date</label>
    <input type="date" id="date" name="date" required max="{{ date('Y-m-d') }}">

    <label for="amount">Amount</label>
    <input type="number" id="amount" name="amount" required>

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="Unpaid">Unpaid</option>
        <option value="Paid">Paid</option>
        <option value="Cancelled">Cancelled</option>
    </select>

    <button type="submit">Create Invoice</button>
</form>
<script src="{{ asset('assets/js/add_invoice.js') }}?v={{ time() }}"></script>
@endsection