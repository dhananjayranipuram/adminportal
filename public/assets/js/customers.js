var baseEditUrl = baseUrl+'/customer/edit';

$.ajax({
    url: baseUrl+'/api/list',
    method: "POST",
    contentType: "application/json",
    dataType: "json",
    data: JSON.stringify({ type: 'customer' }),
    success: function(data) {
        var tbody = $('#customerTable tbody');
        var row = '';

        if (data.length > 0) {
            data.forEach(function(customer) {
                row += `
                    <tr>
                        <td>${customer.id}</td>
                        <td>${customer.name}</td>
                        <td>${customer.phone}</td>
                        <td>${customer.email}</td>
                        <td>${customer.address}</td>
                        <td><a href="${baseEditUrl}/${customer.id}">Edit</a></td>
                    </tr>`;
            });
        } else {
            row = `<tr><td colspan="6" style="text-align: center;">No data available</td></tr>`;
        }

        tbody.html(row);
    },
    error: function(xhr, status, error) {
        console.error("Error:", error);
    }
});