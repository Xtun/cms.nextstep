<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{

    protected $_module_title;
    protected $_templates;

    public function  __construct()
    {
        parent::__construct();

        $this->_module_title                  = 'Панель управления';
        $this->template_data['module_title']  = $this->_module_title;

        $this->_templates['dashboard'] = 'dashboard/index';

        // colorbox
        $this->template_data['add_css'][] = base_url('www_admin/js/lib/colorbox/colorbox.css');
        // fullcalendar
        $this->template_data['add_css'][] = base_url('www_admin/js/lib/fullcalendar/fullcalendar_beoro.css');

        // jQuery UI
        $this->template_data['add_scripts'][] = base_url('www_admin/js/lib/jquery-ui/jquery-ui-1.10.2.custom.min.js');
        // touch event support for jQuery UI
        $this->template_data['add_scripts'][] = base_url('www_admin/js/lib/jquery-ui/jquery.ui.touch-punch.min.js');
        // colorbox
        $this->template_data['add_scripts'][] = base_url('www_admin/js/lib/colorbox/jquery.colorbox.min.js');
        // fullcalendar
        $this->template_data['add_scripts'][] = base_url('www_admin/js/lib/fullcalendar/fullcalendar.min.js');
        // flot charts
        $this->template_data['add_scripts'][] = base_url('www_admin/js/lib/flot-charts/jquery.flot.js');
        $this->template_data['add_scripts'][] = base_url('www_admin/js/lib/flot-charts/jquery.flot.resize.js');
        $this->template_data['add_scripts'][] = base_url('www_admin/js/lib/flot-charts/jquery.flot.pie.js');
        $this->template_data['add_scripts'][] = base_url('www_admin/js/lib/flot-charts/jquery.flot.orderBars.js');
        $this->template_data['add_scripts'][] = base_url('www_admin/js/lib/flot-charts/jquery.flot.tooltip.js');
        $this->template_data['add_scripts'][] = base_url('www_admin/js/lib/flot-charts/jquery.flot.time.js');
        // responsive carousel
        $this->template_data['add_scripts'][] = base_url('www_admin/js/lib/carousel/plugin.min.js');
        // responsive image grid
        $this->template_data['add_scripts'][] = base_url('www_admin/js/lib/wookmark/jquery.imagesloaded.min.js');
        $this->template_data['add_scripts'][] = base_url('www_admin/js/lib/wookmark/jquery.wookmark.min.js');

        $this->template_data['add_scripts'][] = base_url('www_admin/js/pages/beoro_dashboard.js');
    }

    public function index()
    {
        $this->load->admin_view($this->_templates['dashboard'], $this->template_data);
    }

}