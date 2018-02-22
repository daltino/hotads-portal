/**
 * Created by Dalton Whyte, Hotads Ltd on 10/12/17.
 */
$(init);

function init(){
    $('.collapse').collapse();
    $('.collapse').on('hide.bs.collapse', function () {
        console.log('working');
    });
    var today = moment().format('MMMM Do YYYY, h:mm:ss a');
    var location = $('.location').html();
    $('#userTable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv',
            {
                extend: 'excel',
                title: location + ' Free WiFi Subscribers',
                messageTop: 'Generated on ' + today
            },
            {
                extend: 'pdf',
                title: location + ' Free WiFi Subscribers',
                messageTop: 'Generated on ' + today
            },
            {
                extend: 'print',
                title: location + ' Free WiFi Subscribers',
                messageTop: 'Generated on ' + today
            }
        ]
    });
}