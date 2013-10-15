/* [ ---- Beoro Admin - tables ---- ] */

    $(document).ready(function() {
        //* datatable must be rendered first
        beoro_galery_table.init();
        //* actions for tables, datatables
        beoro_select_row.init();
        beoro_delete_rows.simple();
        beoro_delete_rows.dt();
        beoro_delete_rows.single();
    });

    //* select all rows
    beoro_select_row = {
        init: function() {
            $('.select_rows').click(function () {
                var tableid = $(this).data('tableid');
                $('#'+tableid).find('input[name=row_sel]').attr('checked', this.checked);
            });
        }
    };

    //* delete rows
    beoro_delete_rows = {
        single: function() {
            $('.delete_single_row').on('click', function(e) {
                e.preventDefault();
                $(this).addClass('deleting');

                $.colorbox({
                    initialHeight: '0',
                    initialWidth: '0',
                    href: "#confirm_dialog",
                    inline: true,
                    opacity: '0.3',
                    onComplete: function(){
                        $('.confirm_yes').click(function(e){
                            var link = $('.delete_single_row.deleting');

                            $.colorbox.close();

                            link.closest('tr').fadeTo(300, 0, function () {
                                $(this).remove();
                                document.location.href = link.attr('href');
                            });
                        });
                        $('.confirm_no').click(function(e){
                            e.preventDefault();
                            $.colorbox.close();
                        });
                    },
                    onClosed: function() {
                        $('.delete_single_row.deleting').removeClass('deleting');
                    }
                });
            });
        },

        //* simple
        simple: function() {
            $(".delete_rows_simple").on('click',function (e) {
                e.preventDefault();
                var tableid = $(this).data('tableid');
                if($('input[name=row_sel]:checked', '#'+tableid).length) {
                    $.colorbox({
                        initialHeight: '0',
                        initialWidth: '0',
                        href: "#confirm_dialog",
                        inline: true,
                        opacity: '0.3',
                        onComplete: function(){
                            $('.confirm_yes').click(function(e){
                                e.preventDefault();
                                $('input[name=row_sel]:checked', '#'+tableid).closest('tr').fadeTo(300, 0, function () {
                                    $(this).remove();
                                    $('.select_rows','#'+tableid).attr('checked',false);
                                });
                                $.colorbox.close();
                            });
                            $('.confirm_no').click(function(e){
                                e.preventDefault();
                                $.colorbox.close();
                            });
                        }
                    });
                }
            });
        },
        //* datatable
        dt: function() {
            $(".delete_rows_dt").on('click',function (e) {
                e.preventDefault();
                var tableid = $(this).data('tableid'),
                    oTable = $('#'+tableid).dataTable();
                if($('input[name=row_sel]:checked', '#'+tableid).length) {
                    $.colorbox({
                        initialHeight: '0',
                        initialWidth: '0',
                        href: "#confirm_dialog",
                        inline: true,
                        opacity: '0.3',
                        onComplete: function(){
                            $('.confirm_yes').click(function(e){
                                e.preventDefault();
                                $('input[name=row_sel]:checked', oTable.fnGetNodes()).closest('tr').fadeTo(300, 0, function () {
                                    $(this).remove();
                                    oTable.fnDeleteRow( this );
                                    $('.select_rows','#'+tableid).attr('checked',false);
                                });
                                $.colorbox.close();
                            });
                            $('.confirm_no').click(function(e){
                                e.preventDefault();
                                $.colorbox.close();
                            });
                        }
                    });
                }
            });
        }
    };

    //* gallery table view
    beoro_galery_table = {
        init: function() {
            if($('#dt_text').length) {
                $('#dt_text').dataTable({
                    "oLanguage": {
                        "sUrl": "/www_admin/js/lib/datatables/i18n/ru.txt"
                    },
                    "sPaginationType": "bootstrap",
                    "aaSorting": [[ 2, "asc" ]],
                    "aoColumns": [
                        { "bSortable": false },
                        { "sType": "string" },
                        { "bSortable": false }
                    ]
                });
            }
        }
    };