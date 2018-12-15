<div class="row">
	<div class="col-md-12"> 
		<?php if($this->session->flashdata('status')): ?>
			<div class="alert alert-warning" role="alert"> 
				<?= $this->session->flashdata('status');?>
			</div>
		<?php endif; ?>

		<div class="panel panel-primary">
			<div class="panel-heading"> <h3 class="panel-title">Links</h3> </div>
			
			<div class="panel-body">
				<p> <a href="<?php echo base_url();?>link/add" class="btn btn-success" role="button" title="Tambah data siswa">Add</a></p>  
				
				<table class="table table-hover" id="data">
					<thead> 
						<tr> 
							<th>Title</th> 
							<th>Long URL</th> 
							<th>Short URL</th> 
							<th>Last Update</th> 
							<th>Action</th> 
						</tr> 
					</thead>
					<tfoot> 
						<tr> 
							<th>Title</th> 
							<th>Long URL</th> 
							<th>Short URL</th> 
							<th>Last Update</th> 
							<th></th> 
						</tr> 
					</tfoot>
					
					<tbody>
						<?php foreach ($query->result() as $row){ ?>
						<tr>
						<td> <?= $row->title;?></td>
							<td> <?= $row->input_url;?></td>
							<td> <?= $row->output_url;?></td>
							<td> <?= date("d F Y H:i", strtotime($row->last_update));?> </td>
							<td> 
								<a href="<?= base_url()."link/get/".$row->id;?>" title="Detail" class="btn btn-default" role="button">Details</a>

								<a href="<?= base_url()."link/delete/".$row->id;?>" class="btn btn-danger" role="button" onclick='return confirm("Hapus data ?");'>Delete</a>	
							</td>
						</tr>

						<?php } ?>
					</tbody>
				</table>

			</div>  <!-- panel-body -->
		</div> <!-- panel panel-default-->
	</div> <!-- md12 -->
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