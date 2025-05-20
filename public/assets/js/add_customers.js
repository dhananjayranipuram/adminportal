$(document).ready(function() {
    var baseEditUrl = baseUrl+'/customers';
    $('#customerForm').submit(function(e) {
        e.preventDefault();
        var data = {
            type: 'customer',
            name: $('input[name="name"]').val(),
            phone: $('input[name="phone"]').val(),
            email: $('input[name="email"]').val(),
            address: $('textarea[name="address"]').val()
        };

        $.ajax({
            url: baseUrl+'/api/create',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: 'application/json',
            data: JSON.stringify(data),
            dataType: 'json',
            success: function(result) {
                if(result.id) {
                    // $('#message').html("<p style='color: green'>Customer created with ID: " + result.id + "</p>");
                    // $('#customerForm')[0].reset();
                    alert("Customer created with ID: " + result.id);
                    window.location.href = baseEditUrl;
                } else {

                    $('#message').html("<p style='color:red'>Error:"+JSON.stringify(result)+"</p>");
                }
            },
            error: function(xhr) {


                $('#message').html("<p style='color:red'>error:"+xhr.responseText+"</p>");
            }
        });
    });
});