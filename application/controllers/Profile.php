<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends Anggota_Controller
{
    public function index()
    {
        $id     = $this->session->userdata('id_user');
        $profiles = $this->profile->where('id_user',$id)->join('kelas')->orderBy('nama')->orderBy('kelas.id_kelas')->get();

        if (!$profiles) {
            redirect('profile');
        }

        $main_view  = 'profile/index';
        $this->load->view('template',compact('main_view', 'profiles'));
    }

    public function edit()
    {
        $id = $this->session->userdata('id_user');
        $profiles = $this->profile->where('id_user', $id)->get();

        if (!$profiles) {
            redirect('profile');
        }

        $input = (object)$this->input->post(null, true);
        if (!$_POST) {
            $input = (object)$profiles;
            $input->password = '';
        }

        if (!$this->profile->validate()) {
            $main_view = 'profile/form';
            $form_action = "profile/edit";

            $this->load->view('template', compact('main_view', 'form_action', 'input'));
            return;
        }

        //Passwordstring
        if (!empty($input->password)) {
            $input->password = md5($input->password);
        } else {
            unset($input->password);
        }

        //hapus passconf, tidak perlu disimpan ke database
        unset($input->passConf);

        if ($this->profile->where('id_user',$id)->update($input)) {
            $this->session->set_flashdata('success','Data profile berhasil diupdate');
            $this->session->set_userdata('username',$input->username);
        } else {
            $this->session->set_flashdata('error','Data profile gagal diupdate');
        }

        redirect('profile');

    }

    public function username_unik()
    {
        $username = $this->input->post('username');
        $id_user = $this->input->post('id_user');

        $this->profile->where('username', $username);
        !$id_user || $this->profile->where('id_user !=', $id_user);
        $user = $this->profile->get();

        if (count($user)) {
            $this->form_validation->set_message('username_unik', '%s sudah digunakan');
            return false;
        }
        return true;
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

    public function alpha_coma_dash_dot_space($str)
    {
        if (!preg_match('/^[a-zA-Z ., \-]+$/i',$str) )
        {
            $this->form_validation->set_message('alpha_coma_dash_dot_space', 'Hanya boleh berisi huruf, spasi, tanda hubung(-), titik(.) dan koma(,)');
            return false;
        }
    }
}