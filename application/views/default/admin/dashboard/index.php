<body class="bg_d">
    <!-- main wrapper (without footer) -->
    <div class="main-wrapper">

        <!-- top bar -->
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <!-- <div class="pull-right top-search">
                        <form action="" >
                            <input type="text" name="q" id="q-main">
                            <button class="btn"><i class="icon-search"></i></button>
                        </form>
                    </div> -->
                    <div id="fade-menu" class="pull-left">
                        <ul class="clearfix" id="mobile-nav">
                            <li>
                                <a href="<?= base_url('admin/dashboard'); ?>">Панель управления</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Модули</a>
                                <ul>
                                    <? foreach ( $menu as $href => $title ) : ?>
                                        <li>
                                            <a href="<?= base_url($href); ?>" role="menuitem">
                                                <?= $title; ?>
                                            </a>
                                        </li>
                                    <? endforeach; ?>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>" target="_blank">Просмотр сайта</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- END top bar -->

        <!-- header -->
        <header>
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="main-logo">
                            <a href="<?= base_url('admin/dashboard'); ?>">
                                <img src="<?= base_url('www_admin/img/logos/logo_min.png'); ?>" />
                            </a>
                        </div>
                    </div>
                    <div class="span5">
                        <nav class="nav-icons">
                            <ul>
                                <li>
                                    <a href="<?= base_url('admin/dashboard'); ?>" class="ptip_s" title="Панель управления"><i class="icsw16-home"></i></a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/map'); ?>" class="ptip_s" title="Карта сайта"><i class="icsw16-map"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="icsw16-frames"></i> <span class="caret"></span></a>
                                    <ul role="menu" class="dropdown-menu">
                                        <? foreach ( $menu as $href => $title ) : ?>
                                            <li role="presentation">
                                                <a href="<?= base_url($href); ?>" role="menuitem">
                                                    <?= $title; ?>
                                                </a>
                                            </li>
                                        <? endforeach; ?>
                                    </ul>
                                </li>
                                <!-- <li><a href="javascript:void(0)" class="ptip_s" title="Mailbox"><i class="icsw16-mail"></i><span class="badge badge-info">6</span></a></li> -->
                                <!-- <li><a href="javascript:void(0)" class="ptip_s" title="Comments"><i class="icsw16-speech-bubbles"></i><span class="badge badge-important">14</span></a></li> -->
                                <!-- <li class="active"><span class="ptip_s" title="Statistics (active)"><i class="icsw16-graph"></i></span></li> -->
                                <li>
                                    <a href="<?= base_url('admin/settings'); ?>" class="ptip_s" title="Настройки сайта"><i class="icsw16-cog"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="span4">
                        <div class="user-box">
                            <div class="user-box-inner">
                                <div class="user-info">
                                    Привет, <strong><?= $user_name; ?></strong>
                                    <ul class="unstyled">
                                        <li>
                                            <a href="#">Настройки</a>
                                        </li>
                                        <li>&middot;</li>
                                        <li>
                                            <a href="<?= base_url('admin/auth/logout'); ?>">Выход</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END header -->

        <!-- breadcrumbs -->
        <div class="container">
            <ul id="breadcrumbs">
                <li>
                    <a href="<?= base_url('admin/dashboard'); ?>"><i class="icon-home"></i></a>
                </li>
                <!-- <li><a href="javascript:void(0)">Content</a></li>
                <li><a href="javascript:void(0)">Article: Lorem ipsum dolor...</a></li>
                <li><a href="javascript:void(0)">Comments</a></li>
                <li><span>Lorem ipsum dolor sit amet...</span></li> -->
            </ul>
        </div>
        <!-- END breadcrumbs -->

        <!-- main content -->
        <div class="container">
            <div class="row-fluid">
                <div class="span12">
                    <div class="w-box">
                        <div class="w-box-header">Приветствие</div>
                        <div class="w-box-content cnt_a">
                            Добро пожаловать!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_space"></div>

    </div>
    <!-- END main wrapper (without footer) -->