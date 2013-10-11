<div id="login-wrapper" class="clearfix">
    <div class="main-col">

        <a href="http://rg3.su" target="_blank">
            <img src="<?= base_url('www_admin/img/logos/logo_min.png'); ?>" alt="" class="logo_img" />
        </a>

        <div class="panel">
            <p class="heading_main">
                <?= $auth_info['title']; ?>
            </p>
            <p class="auth-info">
                <?= $auth_info['info']; ?>
            </p>
        </div>
    </div>
    <div class="login_links">
        <a href="<?= base_url('admin/auth'); ?>">
            <span>Авторизация</span>
        </a>
    </div>
</div>