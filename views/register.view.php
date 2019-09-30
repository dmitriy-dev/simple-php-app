<?php /** @var array $errors */ ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo \App\Helpers\Lang::get('registration')?></h5>
                <hr>
                <form action="/auth/register" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputName"><?php echo \App\Helpers\Lang::get('name')?></label>
                        <input required type="text" class="form-control" name="name" id="inputName" placeholder="<?php echo \App\Helpers\Lang::get('name')?>" value="<?= $_POST['name'] ?? null?>">
                        <?php if (!empty($errors['name'])): ?>
                            <?php foreach ($errors['name'] as $error): ?>
                                <small class="form-text form-input-error"><?= $error['error'] ?></small>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail"><?php echo \App\Helpers\Lang::get('email')?></label>
                        <input required type="email" class="form-control" name="email" id="inputEmail"
                               placeholder="<?php echo \App\Helpers\Lang::get('email')?>" value="<?= $_POST['email'] ?? null?>">
                        <?php if (!empty($errors['email'])): ?>
                            <?php foreach ($errors['email'] as $error): ?>
                                <small class="form-text form-input-error"><?= $error['error'] ?></small>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="inputAvatar"><?php echo \App\Helpers\Lang::get('avatar')?></label>
                        <input type="file" class="form-control-file" name="avatar" id="inputAvatar">
                        <?php if (!empty($errors['avatar'])): ?>
                            <?php foreach ($errors['avatar'] as $error): ?>
                                <small class="form-text form-input-error"><?= $error['error'] ?></small>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword"><?php echo \App\Helpers\Lang::get('password')?></label>
                        <input required type="password" class="form-control" name="password" id="inputPassword"
                               placeholder="<?php echo \App\Helpers\Lang::get('password')?>">
                        <?php if (!empty($errors['password'])): ?>
                            <?php foreach ($errors['password'] as $error): ?>
                                <small class="form-text form-input-error"><?= $error['error'] ?></small>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="inputPasswordRepeat"><?php echo \App\Helpers\Lang::get('password_confirm')?></label>
                        <input required type="password" class="form-control" name="password_confirmed" id="inputPasswordRepeat"
                               placeholder="<?php echo \App\Helpers\Lang::get('password_confirm')?>">
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo \App\Helpers\Lang::get('registration')?></button>
                </form>
            </div>
        </div>
    </div>
</div>