</div>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  
<script>
    $(document).ready(function() {


	    var ab = $('.una').val();
	    if (ab == 'L') {
	    	$('#mo').val('L');
	    }else if(ab == 'P') {
	    	$('#mo').val('P');
	    }

	    
          //   $( "#title" ).autocomplete({
          //     source: "<?php echo site_url('page/get_autocomplete/?');?>",
          //     select: function (event, ui) {
		        //     window.location = ui.item.url;
		        // }
          //   });

              $('input.typeahead').typeahead({
                    source:  function (query, process) {
                    return $.get('http://localhost/aul/page/pro', { query: query }, function (data) {
                            console.log(data);
                            data = $.parseJSON(data);
                            return process(data);
                        });
                    }
                });

             $.ajaxSetup({ cache: false });
             $('#search1').keyup(function(){
              $('#result').text('');
              $('#state').val('');
              var searchField = $('#search1').val();
              var expression = new RegExp(searchField, "i");
              $.getJSON( 'http://localhost/aul/page/pro', function(data) {

               $.each(data, function(key, value){
                if (value.pasien_nama.search(expression) != -1 || value.pasien_ktp.search(expression) != -1)
                {
                     $('#result').append(`<li class="list-group-item rounded-0 link-class"><a href="<?php echo base_url();?>page/edit/${value.pasien_id}" class="text-dark d-flex justify-content-between">
                        <div class="text-capitalize font-weight-bold">
                            ${value.pasien_nama}
                        </div>
                        <div>
                            <span>${value.pasien_ktp}</span>
                        </div>
                        </a></li>`);
                }else{

                }
               });   
               });
              });
              
    });
     $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        var inp   = '<input type="text" class="form-control" placeholder="Search '+ title +'" />';
        $(this).html(inp);
    } );
 
   
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        });
    });
});
</script>
</body>
</html>