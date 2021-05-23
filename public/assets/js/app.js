$(document).ready( function () {
    $('#table-tasks').DataTable({
        "language": {
        "lengthMenu": "Showing _MENU_ records per page",
            "zeroRecords": "No records found",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "No avaiable records",
            "infoFiltered": "(filter applied of _MAX_ total records)",
            "paginate": {
            "first":      "First",
                "last":       "Last",
                "next":       "Next",
                "previous":   "Previous"
            },
            "loadingRecords": "Loading...",
            "processing":     "Processing...",
            "search":         "Search:",
        },
        "order": [[ 3, "desc" ]],
    } );
} );


