/**
 * Created by Dalton Whyte, Hotads Ltd on 10/12/17.
 */
$(init);

function init(){
    $('.collapse').collapse();
    $('.collapse').on('hide.bs.collapse', function () {
        console.log('working');
    });
    var today = new Date();
    $('#userTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv',
            {
                extend: 'excel',
                title: 'Axa BonusLife Free WiFi Subscribers',
                messageTop: 'Generated on ' + today.toString
            },
            {
                extend: 'pdf',
                title: 'Axa BonusLife Free WiFi Subscribers',
                messageTop: 'Generated on ' + today.toString
            },
            {
                extend: 'print',
                title: 'Axa BonusLife Free WiFi Subscribers',
                messageTop: 'Generated on ' + today.toString
            }
        ]
    });
}