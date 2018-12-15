<div class="row">

    <div class="panel panel-primary">
        <div class="panel-heading"> <h3 class="panel-title">Details</h3> </div>
        <div class="panel-body">
  
        <table class="table table-striped">
            <tr> <th>Title</th> <td><?= $header[0]->title;?></td> </tr>
            <tr> <th>Long URL</th> <td><?= $header[0]->input_url;?></td> </tr>
            <tr> 
                <th>Short URL</th> 
                <td> 
                    <a href="<?= $header[0]->output_url;?>" target="_blank"><?= $header[0]->output_url;?></a> 
                </td> 
            </tr>

            <tr> 
                <th>Click Total</th> 
                <td><?= $query->num_rows();?></td> 
            </tr>

            <tr> 
                <th>Last Update</th> 
                <td><?= date("d F Y H:i", strtotime($header[0]->last_update));?></td> 
            </tr>
            
            <tr>
                <td colspan="2"> 
                    <a href="<?= base_url()."link/set/".$header[0]->id;?>" class="btn btn-primary" role="button">Edit</a> 
                </td> 
            </tr>
        </table>

    </div>
    </div>


    <div class="panel panel-primary">
        <div class="panel-heading"> <h3 class="panel-title">Log</h3> </div>
        
        <div class="panel-body">
           
            <table class="table table-hover" id="data">
			    <thead> 
                    <tr> 
                        <th>IP Address</th> 
                        <th>Country</th> 
                        <th>Click At</th>  
                    </tr> 
                </thead>
			    <tfoot>
                    <tr> 
                        <th>IP Address</th> 
                        <th>Country</th> 
                        <th>Click At</th>  
                    </tr>
                </tfoot>
			    
                <tbody>
                    <?php foreach ($query->result() as $row){ ?>
			        <tr>
					    <td> <?= $row->ip_address;?></td>
                        <td> <?= $row->country;?> </td>
                        <td> <?= date("d F Y H:i", strtotime($row->click_at));?></td>                
                    </tr>

                    <?php } ?>
                </tbody>
            </table>

        </div>  <!-- panel-body -->
    </div> <!-- panel panel-default-->

</div>


<script type="text/javascript">
	$(document).ready(function(){
		// Setup - add a text input to each footer cell
	    $('#data tfoot th').each( function () {
	        var title = $(this).text();
	        if(title !=''){
	        	 $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
	        }
	       
		});
	    
	    // DataTable
		var table = $('#data').DataTable();   
		
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
		} );
	});
</script>