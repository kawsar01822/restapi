<?= $this->extend('static/base'); ?>

<?= $this->section('content'); ?>

<div class="col-md-6 offset-md-3 mt-3">
    <?=form_open('blog/edit'); ?>
        <h3>Update Post</h3>
        <input type="hidden" class="form-control" id="id" name="id" value="<?php if($flag == 'edit'){echo $posts[0]->id; }else{ echo set_value('id'); }; ?>">
        <div class="form-group">
            <label for="username">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="<?php if($flag == 'edit'){echo $posts[0]->title; }else{ echo set_value('title');}?>">
            <span class='text-danger'><?php if(isset($validator)){ echo display_error($validator,'title');}?></span>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="write post" rows="5"><?php if($flag == 'edit'){echo $posts[0]->description; }else{ echo set_value('description');}?></textarea>
            <span class='text-danger'><?php if(isset($validator)){ echo display_error($validator,'description');}?></span>
        </div>
        <div class="row">
            <div class="col text-center">
                <input type="submit" class="btn btn-primary " name="send" value="Update">
            </div>  
        </div>
    <?=form_close(); ?>
</div>

<?= $this->endSection(); ?>