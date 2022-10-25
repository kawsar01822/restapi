<?= $this->extend('static/base'); ?>

<?= $this->section('content'); ?>

<div class="col-md-6 offset-md-3 mt-3">
    <?=form_open('blog/create'); ?>
        <h3>Add Post</h3>
        <div class="form-group">
            <label for="username">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="<?= set_value('title');?>">
            <span class='text-danger'><?php if(isset($validator)){ echo display_error($validator,'title');}?></span>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="write post" rows="5"><?= set_value('description');?></textarea>
            <span class='text-danger'><?php if(isset($validator)){ echo display_error($validator,'description');}?></span>
        </div>
        <div class="row">
            <div class="col text-center">
                <input type="submit" class="btn btn-primary " name="send" value="Add">
            </div>  
        </div>
    <?=form_close(); ?>
</div>

<?= $this->endSection(); ?>