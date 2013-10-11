<?php

class Auth extends CI_Controller
{

    protected $_templates;

    public function __construct ()
    {
        parent:: __construct();

        $this->_templates['auth_form'] = 'auth/auth_form';
        $this->_templates['auth_info'] = 'auth/auth_info';
        $this->_templates['pass_form'] = 'auth/pass_form';

        // load user auth model
        $this->load->model('auth_model');
    }

    public function login ()
    {
        $this->check_auth();

        $this->form_validation->set_rules('login_name', 'логин', 'trim|required|min_length[5]|max_length[255]|callback_auth_check');
        $this->form_validation->set_rules('login_password', 'пароль', 'trim|required|min_length[5]|max_length[255]');

        $this->form_validation->set_message('required', 'незаполено поле: %s');
        $this->form_validation->set_message('min_length', '%s не меньше 5 символов');
        $this->form_validation->set_message('max_length', '%s не больше 255 символов');
        $this->form_validation->set_message('auth_check', 'логин или пароль введен неверно');

        $this->form_validation->set_error_delimiters('', '');

        $template_data['forget_form'] = FALSE;
        $template_data['login_form']  = TRUE;

        if ( $this->form_validation->run() )
        {
            redirect(base_url('admin'));
        }
        $this->load->admin_view($this->_templates['auth_form'], $template_data);
    }

    public function logout()
    {
        $this->auth_model->remove_auth();
        redirect(base_url('admin'));
    }


    /*
     * Забыли пароль
     */
    public function forgetpass()
    {
        $this->check_auth();

        $this->form_validation->set_rules('forgot_email', 'e-mail','trim|required|valid_email|callback_forget_email_check');

        $this->form_validation->set_message('required', 'незаполено поле: %s');
        $this->form_validation->set_message('valid_email', 'неверно заполнено поле: %s');
        $this->form_validation->set_message('forget_email_check', 'пользователь с таким e-mail не существует');

        $this->form_validation->set_error_delimiters('', '');

        $template_data['forget_form'] = TRUE;
        $template_data['login_form']  = FALSE;

        if ( $this->form_validation->run() )
        {
            $result = $this->auth_model->forget_pass($this->input->post('forgot_email'));

            $config['mailtype'] = 'html';
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset']  = 'utf-8';
            $config['wordwrap'] = TRUE;

            $this->email->clear();
            $this->email->initialize($config);
            $this->email->from(EMAIL, 'Forget password');
            $this->email->to($this->input->post('forgot_email'));
            $this->email->subject('Forget password!');
            $this->email->message('От Вашего имени был сделан запрос на восстановление пароля, для смены пароля перейдите по <a href="'.base_url().'admin/auth/newpass/'.$result.'">ссылке</a>. Ссылка будет активна в течении 3-х часов.');
            $this->email->send();

            $template_data['auth_info']['title'] = 'Восстановление пароля';
            $template_data['auth_info']['info']  = 'На Ваш E-mail было отпраленно письмо с уникальной ссылкой для восстановление пароля. Ссылка будет активна в течении 3 часов.';

            $this->load->admin_view($this->_templates['auth_info'], $template_data);
        } else {
            $this->load->admin_view($this->_templates['auth_form'], $template_data);
        }
    }


     /*
     * Задание нового пароля
     */
    public function newpass ( $login = '', $hash = '' )
    {
        if ( FALSE !== $this->input->post('new_password') )
        {
            $this->form_validation->set_rules('new_password', 'пароль', 'trim|required|min_length[5]|max_length[255]');

            $this->form_validation->set_message('required', 'незаполено поле: %s');
            $this->form_validation->set_message('min_length', '%s не меньше 5 символов');
            $this->form_validation->set_message('max_length', '%s не больше 255 символов');

            $this->form_validation->set_error_delimiters('', '');

            if ( $this->form_validation->run() && $this->auth_model->new_pass($this->input->post('cur_login'), $this->input->post('cur_hash'), $this->input->post('new_password')) )
            {
                $template_data['auth_info']['title'] = 'Сброс пароля';
                $template_data['auth_info']['info']  = 'Пароль успешно изменен!';

                $this->load->admin_view($this->_templates['auth_info'], $template_data);
            } else {
                $template_data['cur_login'] = $this->input->post('cur_login');
                $template_data['cur_hash']  = $this->input->post('cur_hash');

                $this->load->admin_view($this->_templates['pass_form'], $template_data);
            }
        }
        else
        {
            if ( $this->auth_model->is_hash_pass($login, $hash) )
            {
                $template_data['cur_login'] = $login;
                $template_data['cur_hash']  = $hash;

                $this->load->admin_view($this->_templates['pass_form'], $template_data);
            } else {
                $template_data['auth_info']['title'] = 'Сброс пароля';
                $template_data['auth_info']['info']  = 'Ссылка недействительна!';

                $this->load->admin_view($this->_templates['auth_info'], $template_data);
            }
        }
    }

    public function check_auth ()
    {
        // check user auth
        if ( $this->auth_model->is_auth() )
        {
            redirect(base_url('admin'));
        }
    }


    /*
     * Проверка существоания email для восстановления пароля
     */
    public function forget_email_check($email) {
        if ($this->auth_model->is_empty_email($email)) return false;
        return true;
    }

    public function auth_check ( $login )
    {
        if ( $this->auth_model->auth_user($login, $this->input->post('login_password')) ) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}