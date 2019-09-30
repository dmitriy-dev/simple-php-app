<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <span class="display-1 d-block">404</span>
                <div class="mb-4 lead"><?php echo \App\Helpers\Lang::get('title_404')?></div>
                <a href="<?= \App\Core\Config::gi()->getConfig()['main_page']?>" class="btn btn-link"><?php echo \App\Helpers\Lang::get('back_to_main')?></a>
            </div>
        </div>
    </div>
</div>
