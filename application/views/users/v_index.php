<div class="row">
    <div class="col-md-12"> 
        <div class="panel panel-primary">
            <div class="panel-heading"> <h3 class="panel-title">Profile</h3> </div>

            <table class="table table-striped">
				<tr> <th>Username</th> <td> <?= $query[0]->username;?> </td> </tr>
				<tr> <th>Pass Hash</th> <td> <?= $query[0]->passhash;?> </td> </tr>
        	</table>
            
        </div> <!-- panel panel-default-->
    </div>
</div>