@extends('layouts.admin')

@section('content')

<h2 >Invoice List</h2>
<div><a style="padding-right: 10px;" href="{{ url('/add-invoice') }}">Add New Invoice</a></div>
<table border="1" cellpadding="8" id="invoiceTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>

<script src="{{ asset('assets/js/invoice_list.js') }}?v={{ time() }}"></script>
@endsection