<?php /** @var array $errors */ ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Вход</h5>
                <hr>
                <form action="/auth/login" method="POST">
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input required type="email" class="form-control" name="email" id="inputEmail"
                               placeholder="Email" value="<?= $_POST['email'] ?? null ?>">
                        <?php if (!empty($errors['email'])): ?>
                            <?php foreach ($errors['email'] as $error): ?>
                                <small class="form-text form-input-error"><?= $error['error'] ?></small>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Пароль</label>
                        <input required type="password" class="form-control" name="password" id="inputPassword"
                               placeholder="Пароль">
                    </div>
                    <button type="submit" class="btn btn-primary">Вход</button>
                </form>
            </div>
        </div>
    </div>
</div>