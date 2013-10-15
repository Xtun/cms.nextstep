    <!-- main content -->
    <div class="container">
        <div class="row-fluid">
            <div class="span12">

                <div class="w-box">
                    <div class="w-box-header">
                        <div class="btn-group">
                            <!-- <a href="#" class="btn btn-inverse btn-mini delete_rows_dt" data-tableid="dt_news" title="Edit">Delete</a> -->
                            <a href="<?= base_url('admin/news/add'); ?>" class="btn btn-inverse btn-mini" title="Добавить">Добавить</a>
                        </div>
                    </div>
                    <div class="w-box-content">
                        <table class="table table-vam table-striped" id="dt_news">
                            <thead>
                                <tr>
                                    <th class="table_checkbox" style="width:13px">
                                        <input type="checkbox" name="select_rows" class="select_rows" data-tableid="dt_news" />
                                    </th>
                                    <th>Название</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                <? foreach ( $list as $key => $news ) : ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="row_sel" class="row_sel" />
                                        </td>
                                        <td>
                                            <a href="<?= base_url("admin/news/show/{$news->id}/{$parent_id}"); ?>">
                                                <?= $news->title; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url("admin/news/edit/{$news->id}/{$parent_id}"); ?>" class="btn btn-mini" title="Редактировать">
                                                    <i class="icon-pencil"></i>
                                                </a>
                                                <a href="<?= base_url("admin/news/copy/{$news->id}/{$parent_id}"); ?>" class="btn btn-mini" title="Копировать">
                                                    <i class="icon-retweet"></i>
                                                </a>
                                                <a href="<?= base_url("admin/news/delete/{$news->id}/{$parent_id}"); ?>" class="btn btn-mini delete_single_row" title="Удалить">
                                                    <i class="icon-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <? endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- confirmation box -->
                <div class="hide">
                    <div id="confirm_dialog" class="cbox_content">
                        <div class="sepH_c">
                            <strong>Вы уверены, что хотите удалить эти данные?</strong>
                        </div>
                        <div>
                            <a href="#" class="btn btn-small btn-beoro-3 confirm_yes">Удалить</a>
                            <a href="#" class="btn btn-small confirm_no">Отмена</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer_space"></div>

</div>
<!-- END main wrapper (without footer) -->