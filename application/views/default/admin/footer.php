    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="span5">
                    <div>&copy; <a href="http://rg3.su" target="_blank">RG3 Development</a> <?= $admin['copyright_year']; ?></div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Common JS -->
    <? if ( isset($scripts) ) : ?>
        <? foreach ( $scripts as $script_src ) : ?>
            <script src="<?= $script_src; ?>"></script>
        <? endforeach; ?>
    <? endif; ?>

    <!-- Additional JS -->
    <? if ( isset($add_scripts) ) : ?>
        <? foreach ( $add_scripts as $script_src ) : ?>
            <script src="<?= $script_src; ?>"></script>
        <? endforeach; ?>
    <? endif; ?>

    </body>
</html>