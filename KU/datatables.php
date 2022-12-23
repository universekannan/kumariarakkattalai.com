<link rel="stylesheet" type="text/css" href="datatables/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="datatables/rowReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="datatables/responsive.dataTables.min.css">

<!-- another version  -->
<link rel="stylesheet" href="datatables/bootstrap.min.css"/>
<link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
<link rel="stylesheet" href="datatables/dataTables.responsive.css"/>


<script type="text/javascript" charset="utf8" src="datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="datatables/dataTables.rowReorder.min.js"></script>
<script type="text/javascript" charset="utf8" src="datatables/dataTables.responsive.min.js"></script>

<script>
$(document).ready(function() {
    var table = $('#table').DataTable( {
        responsive: true
    } );
} );
</script>