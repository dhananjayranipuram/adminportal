$(document).ready(function () {

    $.ajax({
        url: baseUrl+'/api/list',
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contentType: 'application/json',
        data: JSON.stringify({ type: 'customer' }),
        success: function (data) {
            data.forEach(function (customer) {
                $('#customer_id').append(`<option value="${customer.id}">${customer.name}</option>`);
            });
        }
    });

    $('#invoiceForm').on('submit', function (e) {
        e.preventDefault();

        const data = {
            type: 'invoice',
            customer_id: $('#customer_id').val(),
            date: $('#date').val(),
            amount: $('#amount').val(),
            status: $('#status').val()
        };

        $.ajax({
            url: baseUrl+'/api/create',
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function (res) {
                alert('Invoice created successfully!');
                window.location.href = baseUrl+'/invoice';
            },
            error: function (xhr) {
                alert('Error creating invoice.');
                
                console.log(xhr.responseText);
            }
        });
    });
});