<div class="row">
    <div class="panel panel-primary">
        <div class="panel-heading"> <h3 class="panel-title">Add</h3> </div>
        
        <div class="panel-body">

            <form action="<?= base_url().'link/add';?>" method="POST">
            
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="<?= set_value('title');?>" placeholder="Title" required="required" autocomplete="off">
                    <?= form_error('title');?>
                </div>
                
                <div class="form-group">
                    <label for="input_url">Long URL</label>
                    <input type="text" class="form-control" name="input_url" value="<?= set_value('input_url');?>" placeholder="Long URL" required="required" autocomplete="off">
                    <?= form_error('input_url');?>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
            </form>

        </div>  <!-- panel-body -->
    </div> <!-- panel panel-default-->

</div>