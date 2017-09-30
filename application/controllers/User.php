<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller
{

    public function index($page = null)
    {
        $users      = $this->user->join('kelas')->orderBy('nama')->orderBy('kelas.id_kelas')->getAll();
        $main_view  = 'user/index';
        $this->load->view('template',compact('main_view', 'users'));
    }

    public function create()
    {
        if (!$_POST) {
            $input = (object) $this->user->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->user->validate()) {
            $main_view      = 'user/form';
            $form_action    = 'user/create';

            $this->load->view('template',compact('main_view', 'form_action', 'input'));
            return;
        }

        // Hash password
        $input->password = md5($input->password);

        if ($this->user->insert($input)) {
            $this->session->set_flashdata('success','Data user berhasil disimpan');
        } else {
            $this->session->set_flashdata('error','Data user gagal disimpan');
        }

        redirect('user');
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

        $this->user->where('no_induk',$no_induk);
        !$id_user || $this->user->where('id_user!=',$id_user);
        $user = $this->user->get();

        if (count($user)) {
            $this->form_validation->set_message('no_induk_unik','%s sudah digunakan');
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

    public function username_unik()
    {
        $username = $this->input->post('username');
        $id_user = $this->input->post('id_user');

        $this->user->where('username', $username);
        !$id_user || $this->user->where('id_user !=', $id_user);
        $user = $this->user->get();

        if (count($user)) {
            $this->form_validation->set_message('username_unik', '%s sudah digunakan');
            return false;
        }
        return true;
    }

    public function edit($id = null)
    {
        $user = $this->user->where('id_user',$id)->get();
        if (!$user) {
            $this->session->set_flashdata('warning','Data user tidak ada');
            redirect('user');
        }

        if (!$_POST) {
            $input = (object) $user;
            $input->password ='';
        } else {
            $input = (object) $this->input->post(null,true);
        }

        if (!$this->user->validate()) {
            $main_view  = 'user/form';
            $form_action = "user/edit/$id";

            $this->load->view('template',compact( 'main_view', 'form_action','input'));
            return;
        }

//        Passwordstring
        if (!empty($input->password)) {
            $input->password = md5($input->password);
        } else {
            unset($input->password);
        }

        if ($this->user->where('id_user',$id)->update($input)) {
            $this->session->set_flashdata('success','Data user berhasil diupdate');
        } else {
            $this->session->set_flashdata('error','Data user gagal diupdate');
        }

        redirect('user');
    }

    public function delete($id = null)
    {
        $user = $this->user->where('id_user',$id)->get();
        if (!$user) {
            $this->session->set_flashdata('warning','Data user tidak ada');
            redirect('user');
        }

        if ($this->user->where('id_user',$id)->delete()){
            $this->session->set_flashdata('success','Data user berhasil dihapus');
        } else {
            $this->session->set_flashdata('error','Data user gagal dihapus');
        }

        redirect('user');
    }


}