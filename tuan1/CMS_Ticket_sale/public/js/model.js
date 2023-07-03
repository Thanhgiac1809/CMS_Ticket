//Khi click vào button sẽ hiện popup
function show_filter() {
    $('#staticBackdrop_filter').modal('show');
}

function show_change_date() {
    $('#staticBackdrop_change_date').modal('show');
}

function show() {
    $('#staticBackdrop').modal('show');
}

$(document).ready(function() {
    $(document).on('click', '.editbtn', function() {
        var stud_id = $(this).val();
        $('#staticBackdrop_update').modal('show');

        $.ajax({
            type: "GET",
            url: "/CMS_Ticker_sale/public/setting_update/" + stud_id,
            success: function(response) {
                $('#goive').val(response.ticket.package);

               // Format date_granttime as dd-mm-yyyy
               var granttime = new Date(response.ticket.date_range);
               var granttimeFormatted = ('0' + granttime.getDate()).slice(-2) + '-' + ('0' + (granttime.getMonth() + 1)).slice(-2) + '-' + granttime.getFullYear();
               $('#dategranttime').val(granttimeFormatted);

               // Format expiration_date as dd-mm-yyyy
               var expirationDate = new Date(response.ticket.expiration_date);
               var expirationDateFormatted = ('0' + expirationDate.getDate()).slice(-2) + '-' + ('0' + (expirationDate.getMonth() + 1)).slice(-2) + '-' + expirationDate.getFullYear();
               $('#dateexpiry').val(expirationDateFormatted);
                
                $('#timegranttime').val(response.ticket.granttime);
                $('#timeexpiry').val(response.ticket.expiry);
                $('#retail_update').val(response.ticket.retail_price);
                $('#combo3').val(response.ticket.combo_price);
                $('#combo4').val(response.ticket.quantity);
                $('#tinhtrang').val(response.ticket.status);
                $('#stud_id').val(response.ticket.ticketid);
            }
        });
    });
});
