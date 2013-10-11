<div id="login-wrapper" class="clearfix">
    <div class="main-col">

        <a href="http://rg3.su" target="_blank">
            <img src="<?= base_url('www_admin/img/logos/logo_min.png'); ?>" alt="" class="logo_img" />
        </a>

        <div class="panel">
            <p class="heading_main">Сброс пароля</p>
            <form id="newpass-validate" action="<?= base_url('admin/auth/newpass'); ?>" method="post">
                <input type="hidden" name="cur_login" value="<?= $cur_login; ?>" />
                <input type="hidden" name="cur_hash" value="<?= $cur_hash; ?>" />

                <label for="new_password">Новый пароль</label>
                <input type="password" id="new_password" name="new_password" />
                <? if ( form_error('new_password') ) : ?>
                    <label for="new_password" generated="true" class="error"><?= form_error('new_password'); ?></label>
                <? endif; ?>

                <div class="submit_sect">
                    <button type="submit" class="btn btn-beoro-3">Изменить</button>
                </div>
            </form>
        </div>
    </div>
    <div class="login_links">
        <a href="<?= base_url('admin/auth'); ?>">
            <span>Авторизация</span>
        </a>
    </div>
</div>