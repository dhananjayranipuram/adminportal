@extends('layouts.admin')

@section('content')
<h2 style="text-align: center;">Edit Invoice</h2>

<form id="editInvoiceForm">
    <input type="hidden" name="id" id="id" value="{{ $invoice->id }}">

    <label>Customer:</label>
    <select name="customer_id" id="customer_id" required>
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}" {{ $invoice->customer_id == $customer->id ? 'selected' : '' }}>
                {{ $customer->name }}
            </option>
        @endforeach
    </select>

    <label>Date:</label>
    <input type="date" name="date" id="date" value="{{ $invoice->date }}" required max="{{ date('Y-m-d') }}">

    <label>Amount:</label>
    <input type="number" name="amount" id="amount" value="{{ $invoice->amount }}" required>

    <label>Status:</label>
    <select name="status" id="status" required>
        <option value="Unpaid" {{ $invoice->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
        <option value="Paid" {{ $invoice->status == 'Paid' ? 'selected' : '' }}>Paid</option>
        <option value="Cancelled" {{ $invoice->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
    </select>

    <button type="submit">Update Invoice</button>
</form>

<div id="message"></div>
<script src="{{ asset('assets/js/invoice_edit.js') }}?v={{ time() }}"></script>

@endsection
