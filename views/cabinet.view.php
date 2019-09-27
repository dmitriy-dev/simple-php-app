<?php /** @var \App\Models\User $user */ ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Персональные данные</h5>
                <hr>
                <p><strong>Имя:</strong> <?= $user->name ?></p>
                <p><strong>Email:</strong> <?= $user->email ?></p>
                <p><strong>Аватар:</strong></p>
                <?php if (!empty($user->image)):?>
                <p>
                    <img src="/<?= $user->image?>">
                </p>
                <?php else:?>
                <p>Не загружен</p>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>