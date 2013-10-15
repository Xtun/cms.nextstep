<?php

class MY_Controller extends CI_Controller {

    protected $scripts = array();
    protected $css     = array();
    protected $menu    = array();

    public function __construct() {
        parent::__construct();
    }

    protected function _get_pages_tree($map_array = array(), $list_tmp = '', $item_tmp = '', $active_id = 0, $params = array()) {
        if ( !is_array($map_array) || (sizeof($map_array) == 0) ) {
            return false;
        }
        if ( empty($list_tmp) ) {
            $list_tmp = $this->_templates['map_list'];
        }
        if ( empty($item_tmp) ) {
            $item_tmp = $this->_templates['map_item'];
        }

        $map       = '';
        $max_level = sizeof($map_array) - 1;

        for ($i = $max_level; $i >= 0 ; $i--)
        {
            if ( !empty($map_array[$i]) && sizeof($map_array[$i] ) > 0)
            {
                foreach ( $map_array[$i] as $key => $page )
                {
                    $j = $i + 1;
                    $tmp_submenu = '';
                    if ( !empty($html_menu[$j]) && sizeof($html_menu[$j]) > 0 )
                    {
                        foreach($html_menu[$j] as $key => $subpage)
                        {
                            if ($page->id == $subpage['parent_id'])
                            {
                                $tmp_submenu .= $subpage['string'];
                            }
                        }
                    }
                    if ( !empty($tmp_submenu) )
                    {
                        $tmp_submenu = $this->load->site_view($list_tmp, array('pages_block' => $tmp_submenu, 'params' => $params), true);
                    }

                    $content_data['page']      = $page;
                    $content_data['submenu']   = $tmp_submenu;
                    $content_data['level']     = $i;
                    $content_data['active_id'] = (int) $active_id;
                    $content_data['params']    = $params;

                    $html_menu[$i][] = array (
                        'parent_id' => $page->parent_id,
                        'string'    => $this->load->site_view($item_tmp, $content_data, TRUE)
                    );
                }
            }
        }

        if (!empty($html_menu[0])) {
            foreach ($html_menu[0] as $menu_item) {
                $map .= $menu_item['string'];
            }
        } else {
            $map = '';
        }
        return $map;
    }
}

class Admin_Controller extends CI_Controller
{

    protected $scripts     = array();
    protected $add_scripts = array();
    protected $css         = array();
    protected $add_css     = array();
    protected $template_data = array();

    public function __construct()
    {
        parent::__construct();

        // load user auth model
        $this->load->model('auth_model');

        // check user auth
        if ( ! ($this->_is_auth = $this->auth_model->is_auth()) )
        {
            redirect(base_url('admin/auth'));
        }

        /* Common Stylesheets */

        // bootstrap framework css
        $this->css[] = base_url('plugins/bootstrap/css/bootstrap.min.css');
        $this->css[] = base_url('plugins/bootstrap/css/bootstrap-responsive.min.css');
        // iconSweet2 icon pack (16x16)
        $this->css[] = base_url('www_admin/img/icsw2_16/icsw2_16.css');
        // splashy icon pack
        $this->css[] = base_url('www_admin/img/splashy/splashy.css');
        // flag icons
        $this->css[] = base_url('www_admin/img/flags/flags.css');
        // power tooltips
        $this->css[] = base_url('www_admin/js/lib/powertip/jquery.powertip.css');

        /* Common JS */

        // jQuery framework
        $this->scripts[] = base_url('www_admin/js/jquery.min.js');
        $this->scripts[] = base_url('www_admin/js/jquery-migrate.js');
        // bootstrap Framework plugins
        $this->scripts[] = base_url('plugins/bootstrap/js/bootstrap.min.js');
        // top menu
        $this->scripts[] = base_url('www_admin/js/jquery.fademenu.js');
        // top mobile menu
        $this->scripts[] = base_url('www_admin/js/selectnav.min.js');
        // actual width/height of hidden DOM elements
        $this->scripts[] = base_url('www_admin/js/jquery.actual.min.js');
        // jquery easing animations
        $this->scripts[] = base_url('www_admin/js/jquery.easing.1.3.min.js');
        // power tooltips
        $this->scripts[] = base_url('www_admin/js/lib/powertip/jquery.powertip-1.1.0.min.js');
        // date library
        $this->scripts[] = base_url('www_admin/js/moment.min.js');
        // common functions
        $this->scripts[] = base_url('www_admin/js/beoro_common.js');

        // www_admin data
        $this->template_data['css']         = $this->css;
        $this->template_data['add_css']     = $this->add_css;
        $this->template_data['scripts']     = $this->scripts;
        $this->template_data['add_scripts'] = $this->add_scripts;
        // modules menu
        $this->template_data['menu'] = $this->config->item('admin_menu');
        // admin variables
        $this->template_data['admin']['copyright_year'] = date('Y', time());

        $this->template_data['user_name'] = $this->session->userdata('rg3user_login');
    }

    protected function _get_pages_tree($map_array = array(), $list_tmp = '', $item_tmp = '', $active_id = 0, $params = array()) {
        if ( !is_array($map_array) || (sizeof($map_array) == 0) ) {
            return false;
        }
        if ( empty($list_tmp) ) {
            $list_tmp = $this->_templates['map_list'];
        }
        if ( empty($item_tmp) ) {
            $item_tmp = $this->_templates['map_item'];
        }

        $map       = '';
        $max_level = sizeof($map_array) - 1;

        for ($i = $max_level; $i >= 0 ; $i--)
        {
            if ( !empty($map_array[$i]) && sizeof($map_array[$i] ) > 0)
            {
                foreach ( $map_array[$i] as $key => $page )
                {
                    $j = $i + 1;
                    $tmp_submenu = '';
                    if ( !empty($html_menu[$j]) && sizeof($html_menu[$j]) > 0 )
                    {
                        foreach($html_menu[$j] as $key => $subpage)
                        {
                            if ($page->id == $subpage['parent_id'])
                            {
                                $tmp_submenu .= $subpage['string'];
                            }
                        }
                    }
                    if ( !empty($tmp_submenu) )
                    {
                        $tmp_submenu = $this->load->admin_view($list_tmp, array('pages_block' => $tmp_submenu, 'params' => $params), true);
                    }

                    $content_data['page']      = $page;
                    $content_data['submenu']   = $tmp_submenu;
                    $content_data['level']     = $i;
                    $content_data['active_id'] = (int) $active_id;
                    $content_data['params']    = $params;

                    $html_menu[$i][] = array (
                        'parent_id' => $page->parent_id,
                        'string'    => $this->load->admin_view($item_tmp, $content_data, TRUE)
                    );
                }
            }
        }

        if (!empty($html_menu[0])) {
            foreach ($html_menu[0] as $menu_item) {
                $map .= $menu_item['string'];
            }
        } else {
            $map = '';
        }
        return $map;
    }

}