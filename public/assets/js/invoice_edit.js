$('#editInvoiceForm').on('submit', function (e) {
    e.preventDefault();

    const data = {
        type: 'invoice',
        id: $('#id').val(),
        customer_id: $('#customer_id').val(),
        date: $('#date').val(),
        amount: $('#amount').val(),
        status: $('#status').val()
    };

    $.ajax({
        url: baseUrl+'/api/update',
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contentType: 'application/json',
        data: JSON.stringify(data),
        success: function (res) {
            alert(res.message);
            window.location.href = baseUrl+'/invoice';
        },
        error: function(xhr) {


            $('#message').html("<p style='color:red'>error:"+xhr.responseText+"</p>");
        }
    });
});