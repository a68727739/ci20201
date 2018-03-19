<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends CI_Controller
{
    function index()
    {
        $data['title'] = '登錄';
        $this->load->view('index_view', $data);
    }
    function log()
    {
        $this->form_validation->set_rules('name', '用戶名', 'required|min_length[4]');
        $this->form_validation->set_rules('passwd', '密碼', 'required|min_length[6]');
        if (!$this->form_validation->run()) {
            $data['title'] = '登錄';
            $data['error'] = '登入失敗了，請檢查你的信息!';
            $this->load->view('index_view', $data);
        } else {
            if ($this->Users_model->check()) {
                // $this->load->view('message_view');
                
                $session['is_login']=TRUE;
                $this->session->set_userdata($session);
                redirect(site_url('member'));//登入成功
            } else {
                $data['title'] = '登錄';
                $data['error'] = '登入失敗了，請檢查你的信息!';
                $this->load->view('index_view', $data);
            }
        }

    }
    function signup()
    {
        $data['title'] = '註冊';
        $this->load->view('signup_view', $data);
    }
    function sign()
    {
        $this->form_validation->set_rules('name', '用戶名',  'required|min_length[4]');
        $this->form_validation->set_rules('passwd', '密碼',  'required|min_length[6]');
        $this->form_validation->set_rules('passwd2', '密碼確認',  'required|min_length[6]|matches[passwd]');
        if (!$this->form_validation->run()) {
            $data['title'] = '註冊';
            $data['error'] = '註冊失敗了，請檢查你的信息!';
            $this->load->view('signup_view', $data);
        } else {
            if ($this->Users_model->add()) {
                redirect('login');
            } else {
                $this->signup();
            }
        }
    }
    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}
