<?php
/** @var string $view */
?>
<!DOCTYPE html>
<html lang="<?php echo \App\Helpers\Lang::current()?>">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">
    <ul class="nav justify-content-center">
        <?php if (null === \App\Core\Auth::gi()->user()): ?>
            <li class="nav-item">
                <a class="btn btn-success" href="/auth/register"><?php echo \App\Helpers\Lang::get('registration')?></a>
            </li>
            <li class="nav-item">
                <a class="btn btn-light" href="/auth/login"><?php echo \App\Helpers\Lang::get('login')?></a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="btn btn-success" href="/cabinet"><?php echo \App\Helpers\Lang::get('cabinet')?></a>
            </li>
            <li class="nav-item">
                <a class="btn btn-success" href="/auth/logout"><?php echo \App\Helpers\Lang::get('logout')?></a>
            </li>
        <?php endif; ?>
        <li class="nav-item languages">
            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                <a href="?lang=ru" class="btn btn-secondary <?php echo 'ru' === \App\Helpers\Lang::current() ? 'active' : null ?>">Rus</a>
                <a href="?lang=en" class="btn btn-secondary <?php echo 'en' === \App\Helpers\Lang::current() ? 'active' : null ?>">Eng</a>
            </div>
        </li>
    </ul>
    <?php include $view; ?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
</body>
</html>