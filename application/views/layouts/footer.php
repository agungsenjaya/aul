</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
<script>
    $(document).ready(function() {


	    var ab = $('.una').val();
	    if (ab == 'L') {
	    	$('#mo').val('L');
	    }else if(ab == 'P') {
	    	$('#mo').val('P');
	    }

	    
            $( "#title" ).autocomplete({
              source: "<?php echo site_url('page/get_autocomplete/?');?>",
              select: function (event, ui) {
		            window.location = ui.item.url;
		        }
            });
        
    });
     $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        var inp   = '<input type="text" class="form-control" placeholder="Search '+ title +'" />';
        $(this).html(inp);
    } );
 
    // DataTable
    var table = $('#myTable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "<?php echo base_url('page/json');?>",
                        "dataSrc": "Data",
                        "type": "POST"
                    }
                });
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>
</body>
</html>