<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller
{

    public function index()
    {
        $input = (object)$this->register->getDefaultValues();
        $this->load->view('register_form',compact('input'));
    }

    public function create()
    {
        if (!$_POST) {
            $input = (object)$this->register->getDefaultValues();
        } else {
            $input = (object)$this->input->post(null, true);
        }

        if (!$this->register->validate()) {


            $this->load->view('register_form',compact(  'input'));
            return;
        }

        // Hash password
        $input->password = md5($input->password);

        if ($this->register->insert($input)) {
            $this->session->set_flashdata('success','Data user berhasil disimpan');
        } else {
            $this->session->set_flashdata('error','Data user gagal disimpan');
        }

        redirect('login');
    }

    public function is_password_required()
    {
        $edit = $this->uri->segment(2);

        if ($edit != 'edit') {
            $password = $this->input->post('password', true);
            if (empty($password)) {
                $this->form_validation->set_message('is_password_required', '%s harus diisi');
                return false;
            }
        }
        return true;
    }

    public function username_unik()
    {
        $username = $this->input->post('username');
        $id_user = $this->input->post('id_user');

        $this->register->where('username', $username);
        !$id_user || $this->register->where('id_user !=', $id_user);
        $user = $this->register->get();

        if (count($user)) {
            $this->form_validation->set_message('username_unik', '%s sudah digunakan');
            return false;
        }
        return true;
    }

    public function alpha_coma_dash_dot_space($str)
    {
        if (!preg_match('/^[a-zA-Z ., \-]+$/i',$str) )
        {
            $this->form_validation->set_message('alpha_coma_dash_dot_space', 'Hanya boleh berisi huruf, spasi, tanda hubung(-), titik(.) dan koma(,)');
            return false;
        }
    }
    
    public function no_induk_unik()
    {
        $no_induk = $this->input->post('no_induk');
        $id_user = $this->input->post('id_user');

        $this->register->where('no_induk',$no_induk);
        !$id_user || $this->register->where('id_user!=',$id_user);
        $user = $this->register->get();

        if (count($user)) {
            $this->form_validation->set_message('no_induk_unik','%s sudah digunakan');
            return false;
        }
        return true;
    }
}