/**
 * Created by Dalton Whyte, Hotads Ltd on 10/12/17.
 */
$(init);

function init(){
    $('.collapse').collapse();
    $('.collapse').on('hide.bs.collapse', function () {
        console.log('working');
    });
    $('#userTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf'
        ]
    });
}