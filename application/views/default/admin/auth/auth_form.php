<div id="login-wrapper" class="clearfix">
    <div class="main-col">

        <a href="http://rg3.su" target="_blank">
            <img src="<?= base_url('www_admin/img/logos/logo_min.png'); ?>" alt="" class="logo_img" />
        </a>

        <div class="panel" <?= ( $forget_form ) ? 'style="display:none"' : ''; ?>>
            <p class="heading_main">Авторизация</p>
            <form id="login-validate" action="<?= base_url('admin/auth/login'); ?>" method="post">
                <label for="login_name">Логин</label>
                <input type="text" id="login_name" name="login_name" value="<?= set_value('login_name'); ?>" />
                <? if ( form_error('login_name') ) : ?>
                    <label for="login_name" generated="true" class="error"><?= form_error('login_name'); ?></label>
                <? endif; ?>

                <label for="login_password">Пароль</label>
                <input type="password" id="login_password" name="login_password" value="" />
                <? if ( form_error('login_password') ) : ?>
                    <label for="login_password" generated="true" class="error"><?= form_error('login_password'); ?></label>
                <? endif; ?>

                <label for="login_remember" class="checkbox">
                    <input type="checkbox" id="login_remember" name="login_remember" /> Запомнить меня
                </label>

                <div class="submit_sect">
                    <button type="submit" class="btn btn-beoro-3">Войти</button>
                </div>
            </form>
        </div>

        <div class="panel" <?= ( $login_form ) ? 'style="display:none"' : ''; ?>>
            <p class="heading_main">Восстановление пароля</p>
            <form id="forgot-validate" action="<?= base_url('admin/auth/forgetpass'); ?>" method="post">

                <label for="forgot_email">Ваш E-mail</label>
                <input type="text" id="forgot_email" name="forgot_email" value="<?= set_value('forgot_email'); ?>" />
                <? if ( form_error('forgot_email') ) : ?>
                    <label for="forgot_email" generated="true" class="error"><?= form_error('forgot_email'); ?></label>
                <? endif; ?>

                <div class="submit_sect">
                    <button type="submit" class="btn btn-beoro-3">Восстановить</button>
                </div>
            </form>
        </div>
    </div>
    <div class="login_links">
        <a href="javascript:void(0)" id="pass_login">
            <span <?= ( $forget_form ) ? 'style="display:none"' : ''; ?>>Забыли пароль?</span>
            <span <?= ( $login_form ) ? 'style="display:none"' : ''; ?>>Авторизация</span>
        </a>
    </div>
</div>