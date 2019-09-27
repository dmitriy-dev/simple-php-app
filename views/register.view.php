<?php /** @var array $errors */ ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Регистрация</h5>
                <hr>
                <form action="/auth/register" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputName">Имя</label>
                        <input required type="text" class="form-control" name="name" id="inputName" placeholder="Имя" value="<?= $_POST['name'] ?? null?>">
                        <?php if (!empty($errors['name'])): ?>
                            <?php foreach ($errors['name'] as $error): ?>
                                <small class="form-text form-input-error"><?= $error['error'] ?></small>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input required type="email" class="form-control" name="email" id="inputEmail"
                               placeholder="Email" value="<?= $_POST['email'] ?? null?>">
                        <?php if (!empty($errors['email'])): ?>
                            <?php foreach ($errors['email'] as $error): ?>
                                <small class="form-text form-input-error"><?= $error['error'] ?></small>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="inputAvatar">Аватар</label>
                        <input type="file" class="form-control-file" name="avatar" id="inputAvatar">
                        <?php if (!empty($errors['avatar'])): ?>
                            <?php foreach ($errors['avatar'] as $error): ?>
                                <small class="form-text form-input-error"><?= $error['error'] ?></small>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Пароль</label>
                        <input required type="password" class="form-control" name="password" id="inputPassword"
                               placeholder="Пароль">
                        <?php if (!empty($errors['password'])): ?>
                            <?php foreach ($errors['password'] as $error): ?>
                                <small class="form-text form-input-error"><?= $error['error'] ?></small>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="inputPasswordRepeat">Повторите пароль</label>
                        <input required type="password" class="form-control" name="password_confirmed" id="inputPasswordRepeat"
                               placeholder="Повторите пароль">
                    </div>
                    <button type="submit" class="btn btn-primary">Регистрация</button>
                </form>
            </div>
        </div>
    </div>
</div>