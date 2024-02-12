$(function () {
    $("#data_table,#data_table2").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pageLength', 'copy', 'excel', 'print'
        ],
        lengthMenu: [
            [10, 25, 50, 100, 500, 1000],
            ['10 rows', '25 rows', '50 rows', '100 rows', '500 rows', "1000 rows"]
        ],
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "order": [], //Initial no order.
    });
    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });
    //Code for data table with buttons
    $("#data_table3,#data_table4").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pageLength', 'copy', 'excel', 'pdf', 'print'
        ],
        lengthMenu: [
            [10, 25, 50, 100, 500, 1000],
            ['10 rows', '25 rows', '50 rows', '100 rows', '500 rows', "1000 rows"]
        ],
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "order": [], //Initial no order.
    });
    //Code for data table for report
    $("#data_table_report,#data_table_report2").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel'
        ],
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "order": [], //Initial no order.
    });
    //Code for select 2
    $('.select2').select2()
    //Ajax Live Search
    $('.livesearch').select2({
        placeholder: 'Search Emp.',
        ajax: {
            url: '/employeeListAjax',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                console.log(data);
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
    //End
});

CKEDITOR.replace('ticketDetails');
CKEDITOR.config.width = '100%'; // CSS unit (percent).
CKEDITOR.config.height = 80;
function myFunction() {
    alert("This feature is locked.");
}
function delete_data(event_id) {
    var a = confirm('Are you sure to delete this record?');
    if (a == true) {
        event.preventDefault();
        document.getElementById("delete_form_" + event_id).submit();
    } else {
        return false;
    }
}

function setSelectedValue(selectObj, valueToSet) {
    //alert(valueToSet);
    for (var i = 0; i < selectObj.options.length; i++) {
        if (selectObj.options[i].value == valueToSet) {
            selectObj.options[i].selected = true;
            return;
        }
    }
}