<?= $this->extend('static/base'); ?>

<?= $this->section('content'); ?>
    <div class="m-5">
        <?php

            $this->session = \Config\Services::session();

            if(!is_null($this->session->getTempdata('success'))){
                echo $this->session->getTempdata('success');
            }

            if(!is_null($this->session->getTempdata('error'))){
                echo $this->session->getTempdata('error');
            }
        ?>

        <?php
            foreach($posts as $post){
        ?>
            <h2><?= $post->title; ?></h2>
            <p><?= $post->description; ?></p>
            <div class="row">
                <?= form_open('blog/edit'); ?>
                    <input type="hidden" name="id" value="<?= $post->id; ?>">
                    <input type="submit" class="btn btn-warning " name="edit" value="Edit">
                <?= form_close(); ?>
                <span class="ml-3"></span>
                <?php $data = array('onsubmit' => "return confirm('are you sure?')"); ?>
                <?= form_open('blog/delete',$data); ?>
                    <input type="hidden" name="id" value="<?= $post->id; ?>">
                    <input type="submit" class="btn btn-danger " name="delete" value="Delete">
                <?= form_close(); ?>
            </div>
            <hr>
        <?php
            }
        ?>
    </div>
<?= $this->endSection(); ?>