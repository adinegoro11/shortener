<div class="row">
    <div class="col-md-12"> 
        <div class="panel panel-primary">
            <div class="panel-heading"> <h3 class="panel-title">Top 10</h3> </div>

            <table class="table table-striped">
            <tr> 
                <th>No.</th>
                <th>Title</th>
                <th>Long URL</th>
                <th>Short URL</th>
                <th>Total</th>
            </tr>
            <?php $i=1;foreach ($hitung->result() as $row): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row->title ?></td>
                    <td><?= $row->input_url ?></td>
                    <td><?= $row->output_url ?></td>
                    <td><?= $row->jumlah ?></td>  
                </tr>
            <?php $i++;endforeach; ?>
         
        </table>
            
        </div> <!-- panel panel-default-->
    </div>
</div>