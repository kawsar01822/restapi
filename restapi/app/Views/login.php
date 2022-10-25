<?= $this->extend('static/base'); ?>

<?= $this->section('content'); ?>

    <div class="col-md-6 offset-md-3 mt-3">
        <?=form_open('user/login'); ?>
            <input type="hidden" name="grant_type" value="password">

            <div class="form-group">
                <label for="username">Email address</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="kawsar">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="password">
            </div>
            <div class="row">
                <div class="col text-center">
                    <input type="submit" class="btn btn-primary " name="send" value="login">
                </div>  
            </div>
        <?=form_close(); ?>
    </div>

<?= $this->endSection(); ?>