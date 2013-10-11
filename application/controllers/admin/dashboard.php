<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{

    protected $_templates;

    public function  __construct()
    {
        parent::__construct();

        $this->_templates['dashboard'] = 'dashboard/index';
    }

    public function index()
    {

        $this->template_data['user_name'] = $this->session->userdata('rg3user_login');
        $this->load->admin_view($this->_templates['dashboard'], $this->template_data);
    }

}