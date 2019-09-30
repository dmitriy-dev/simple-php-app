<?php /** @var \App\Models\User $user */ ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo \App\Helpers\Lang::get('profile_data') ?></h5>
                <hr>
                <p><strong><?php echo \App\Helpers\Lang::get('name') ?>:</strong> <?= $user->name ?></p>
                <p><strong><?php echo \App\Helpers\Lang::get('email') ?>:</strong> <?= $user->email ?></p>
                <p><strong><?php echo \App\Helpers\Lang::get('avatar') ?>:</strong></p>
                <?php if (null !== $user->image && file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $user->image)): ?>
                    <p>
                        <img src="/<?= $user->image ?>">
                    </p>
                <?php else: ?>
                    <p><?php echo \App\Helpers\Lang::get('was_not_uploaded') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>