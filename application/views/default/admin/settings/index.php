    <!-- main content -->
    <div class="container">
        <div class="row-fluid">
            <div class="span12">

                <div class="w-box w-box-green">
                    <div class="w-box-header">
                        <h4>Настройки</h4>
                        <i class="icsw16-settings icsw16-white pull-right"></i>
                    </div>
                    <div class="w-box-content cnt_a">
                        <div class="row-fluid">
                            <div class="span6">
                                <p class="heading_a">Общие</p>
                                <div class="formSep">
                                    <label for="s_name">Site Name</label>
                                    <input type="text" class="span8" id="s_name" name="s_name" value="Beoro Admin Template" />
                                </div>
                                <div class="formSep">
                                    <label for="s_offline">Site Offline</label>
                                    <input type="checkbox" id="s_offline" name="s_offline" />
                                </div>
                                <div class="formSep">
                                    <label for="s_off_message">Offline Message</label>
                                    <textarea name="s_off_message" id="s_off_message" cols="30" rows="4" class="span8">
                                        This site is down for maintenance. Please check back again soon.
                                    </textarea>
                                </div>
                                <div class="formSep">
                                    <label for="cacheMode">Cache mode</label>
                                    <select id="cacheMode" name="cacheMode" class="span8">
                                        <option value="both">Use the server and the browser cache</option>
                                        <option value="server">Use only the server cache</option>
                                        <option value="browser">Use only the browser cache</option>
                                        <option value="none">Disable caching</option>
                                    </select>
                                    <span class="help-block help-last">Here you can select the cache mode.</span>
                                </div>
                            </div>
                            <div class="span6">
                                <p class="heading_a">SEO settings</p>
                                <div class="formSep">
                                    <label for="s_seo_engine">Search Engine Friendly URLs</label>
                                    <input type="checkbox" checked id="s_seo_engine" name="s_seo_engine" />
                                    <span class="help-block help-last">Select whether or not the URLs are optimised for Search Engines.</span>
                                </div>
                                <div class="formSep sepH_c">
                                    <label for="s_seo_rewrite">Use URL rewriting</label>
                                    <input type="checkbox" id="s_seo_rewrite" name="s_seo_rewrite" />
                                    <span class="help-block help-last">Select to use a server's rewrite engine to catch URLs that meet specific conditions and rewrite them as directed.</span>
                                </div>
                                <p class="heading_a">Date & Time</p>
                                <div class="formSep">
                                    <label for="time_format">Time Format</label>
                                    <select name="time_format" id="time_format" class="span6">
                                        <option value="H:i">08:25</option>
                                        <option value="H:i:s">08:25:16</option>
                                        <option value="g:i a">08:25 am</option>
                                        <option value="g:i A">08:25 AM</option>
                                    </select>
                                    <span class="help-block help-last">This format is used to display dates on the website.</span>
                                </div>
                                <div class="formSep">
                                    <label for="date_format">Date Format</label>
                                    <select name="date_format" id="date_format" class="span6">
                                        <option value="j/n/Y">29/11/2012</option>
                                        <option value="j-n-Y">29-11-2012</option>
                                        <option value="j.n.Y">29.11.2012</option>
                                        <option value="n/j/Y">11/29/2012</option>
                                        <option value="d/m/Y">29/11/2012</option>
                                        <option value="d-m-Y">29-11-2012</option>
                                        <option value="d.m.Y">29.11.2012</option>
                                        <option value="m/d/Y">11/29/2012</option>
                                        <option value="m-d-Y">11-29-2012</option>
                                        <option value="m.d.Y">11.29.2012</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <p class="heading_a">Languages</p>
                                <div class="formSep">
                                    <label for="s_lang_visitors">Select the languages that are accessible for visitors</label>
                                    <input type="text" id="s_lang_visitors" name="s_lang_visitors" class="span8" value="English,French,Spanish">
                                </div>
                                <div class="formSep">
                                    <label for="s_lang_redirect">Select the languages that people may automatically be redirected to based upon their browser language</label>
                                    <input type="text" id="s_lang_redirect" name="s_lang_redirect" class="span8" value="English,French,Spanish,Italian">
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <p class="heading_a">Mail Settings</p>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="formSep">
                                            <label for="s_mailer">Mailer</label>
                                            <select id="s_mailer" name="s_mailer" class="span6">
                                                <option value="mail">PHP Mail</option>
                                                <option value="sendmail">Sendmail</option>
                                                <option value="smtp">SMTP</option>
                                            </select>
                                        </div>
                                        <div class="formSep">
                                            <label for="s_mail_from">From Email</label>
                                            <input type="text" class="span8" id="s_mail_from" name="s_mail_from" value="beoro@example.com" />
                                        </div>
                                        <div class="formSep">
                                            <label for="s_mail_name">From Name</label>
                                            <input type="text" class="span8" id="s_mail_name" name="s_mail_name" value="Beoro Admin" />
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <div class="formSep">
                                            <label for="s_smtp_user">SMTP Username</label>
                                            <input type="text" class="span8" id="s_smtp_user" name="s_smtp_user" />
                                        </div>
                                        <div class="formSep">
                                            <label for="s_smtp_password">SMTP Password</label>
                                            <input type="text" class="span8" id="s_smtp_password" name="s_smtp_password" />
                                        </div>
                                        <div class="formSep">
                                            <label for="s_smtp_host">SMTP Host</label>
                                            <input type="text" class="span8" id="s_smtp_host" name="s_smtp_host" value="localhost" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-box-footer">
                        <div class="f-center">
                            <button class="btn btn-beoro-3">Save</button>
                            <button class="btn btn-link inv-cancel">Cancel</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer_space"></div>

</div>
<!-- END main wrapper (without footer) -->


<div id="content">
    <form action="<?= base_url('admin/settings'); ?>" method="post" enctype="multipart/form-data">
        <table class="admin_module_form">
            <tr><td class="admin_module_form_title"></td><td class="admin_error_message"><?=validation_errors();?></td></tr>
            <tr>
                <td class="admin_module_form_title">загрузить логотип</td>
                <td>
                    <input type="file" name="SITE_LOGO" size="255" /><br/>
                    <? if ( ! empty($settings['SITE_LOGO'])) : ?>
                        <img src="<?= $settings['SITE_LOGO']; ?>"/>
                    <? endif; ?>
                </td>
            </tr>
            <tr>
                <td class="admin_module_form_title">название</td>
                <td>
                    <input type="text" name="SITE_TITLE" size="255" value="<?= $settings['SITE_TITLE']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="admin_module_form_title">описание</td>
                <td>
                    <textarea name="SITE_DESCRIPTION"><?= $settings['SITE_DESCRIPTION']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="admin_module_form_title">ключевые слова</td>
                <td>
                    <input type="text" name="SITE_KEYWORDS" value="<?= $settings['SITE_KEYWORDS']; ?>"/>
                </td>
            </tr>
            <tr>
                <td class="admin_module_form_title">укажите отправителя</td>
                <td>
                    <input type="text" name="EMAIL" size="255" value="<?= $settings['EMAIL']; ?>"/>
                </td>
            </tr>
            <tr>
                <td class="admin_module_form_title">email пересылки</td>
                <td>
                    <input type="text" name="MY_EMAIL" size="255" value="<?= $settings['MY_EMAIL']; ?>"/>
                </td>
            </tr>
            <tr>
                <td class="admin_module_form_title">счетчики</td>
                <td>
                    <textarea name="SITE_COUNTERS"><?= $settings['SITE_COUNTERS']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="admin_module_form_title">sitemap.xml</td>
                <td>
                    <a href="<?= base_url('sitemap.xml'); ?>" target="_blank">
                        <?= base_url('sitemap.xml'); ?>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="admin_module_form_title">robots.txt</td>
                <td>
                    <textarea name="ROBOTS_TXT"><?= $settings['ROBOTS_TXT']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href="<?= base_url('robots.txt'); ?>" target="_blank">
                        <?= base_url('robots.txt'); ?>
                    </a>
                </td>
            </tr>

            <tr>
                <td class="admin_module_form_title"></td>
                <td>
                    <input type="submit" value="сохранить" class="admin_module_form_submit" />
                </td>
            </tr>
        </table>
     </form>
</div>