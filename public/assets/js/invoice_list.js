
var baseEditUrl = baseUrl+'/invoice/edit';

$.ajax({
    url: baseUrl+'/api/list',
    method: 'POST',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    xhrFields: {
        withCredentials: true
    },
    contentType: 'application/json',
    data: JSON.stringify({ type: 'invoice' }),
    success: function(data) {
        var row = '';
        if (data.length > 0) {
            data.forEach(function(invoice) {
                row += `<tr>
                        <td>${invoice.id}</td>
                        <td>${invoice.customer?invoice.customer.name:''}</td>
                        <td>${invoice.date}</td>
                        <td>${invoice.amount}</td>
                        <td>${invoice.status}</td>
                        <td>
                            <a href="${baseEditUrl}/${invoice.id}">Edit</a>
                        </td>
                    </tr>`;
            });
        }else{
            row = `<tr>
                    <td colspan="6" style="text-align: center;">No data available</td>
                </tr>`;
        }
        $('#invoiceTable tbody').html(row);
    },
    error: function(xhr) {
        alert('Error loading invoices');
        console.error(xhr.responseText);
    }
});