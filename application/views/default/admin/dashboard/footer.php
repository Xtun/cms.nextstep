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

    <!-- Dashboard JS -->
        <!-- jQuery UI -->
            <script src="<?= base_url('www_admin/js/lib/jquery-ui/jquery-ui-1.10.2.custom.min.js'); ?>"></script>
        <!-- touch event support for jQuery UI -->
            <script src="<?= base_url('www_admin/js/lib/jquery-ui/jquery.ui.touch-punch.min.js'); ?>"></script>
        <!-- colorbox -->
            <script src="<?= base_url('www_admin/js/lib/colorbox/jquery.colorbox.min.js'); ?>"></script>
        <!-- fullcalendar -->
            <script src="<?= base_url('www_admin/js/lib/fullcalendar/fullcalendar.min.js'); ?>"></script>
        <!-- flot charts -->
            <script src="<?= base_url('www_admin/js/lib/flot-charts/jquery.flot.js'); ?>"></script>
            <script src="<?= base_url('www_admin/js/lib/flot-charts/jquery.flot.resize.js'); ?>"></script>
            <script src="<?= base_url('www_admin/js/lib/flot-charts/jquery.flot.pie.js'); ?>"></script>
            <script src="<?= base_url('www_admin/js/lib/flot-charts/jquery.flot.orderBars.js'); ?>"></script>
            <script src="<?= base_url('www_admin/js/lib/flot-charts/jquery.flot.tooltip.js'); ?>"></script>
            <script src="<?= base_url('www_admin/js/lib/flot-charts/jquery.flot.time.js'); ?>"></script>
        <!-- responsive carousel -->
            <script src="<?= base_url('www_admin/js/lib/carousel/plugin.min.js'); ?>"></script>
        <!-- responsive image grid -->
            <script src="<?= base_url('www_admin/js/lib/wookmark/jquery.imagesloaded.min.js'); ?>"></script>
            <script src="<?= base_url('www_admin/js/lib/wookmark/jquery.wookmark.min.js'); ?>"></script>

            <script src="<?= base_url('www_admin/js/pages/beoro_dashboard.js'); ?>"></script>

    </body>
</html>