var baseEditUrl = baseUrl+'/customers';
$('#editCustomerForm').on('submit', function (e) {
    e.preventDefault();

    let data = {
        type: 'customer',
        id: $('#id').val(),
        name: $('#name').val(),
        phone: $('#phone').val(),
        email: $('#email').val(),
        address: $('#address').val()
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
            window.location.href = baseEditUrl;
        },
        error: function(xhr) {


            $('#message').html("<p style='color:red'>error:"+xhr.responseText+"</p>");
        }
    });
});