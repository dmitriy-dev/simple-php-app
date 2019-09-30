<?php /** @var array $errors */ ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo \App\Helpers\Lang::get('sign_in')?></h5>
                <hr>
                <form action="/auth/login" method="POST">
                    <div class="form-group">
                        <label for="inputEmail"><?php echo \App\Helpers\Lang::get('email')?></label>
                        <input required type="email" class="form-control" name="email" id="inputEmail"
                               placeholder="<?php echo \App\Helpers\Lang::get('email')?>" value="<?= $_POST['email'] ?? null ?>">
                        <?php if (!empty($errors['email'])): ?>
                            <?php foreach ($errors['email'] as $error): ?>
                                <small class="form-text form-input-error"><?= $error['error'] ?></small>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword"><?php echo \App\Helpers\Lang::get('password')?></label>
                        <input required type="password" class="form-control" name="password" id="inputPassword"
                               placeholder="<?php echo \App\Helpers\Lang::get('password')?>">
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo \App\Helpers\Lang::get('sign_in')?></button>
                </form>
            </div>
        </div>
    </div>
</div>