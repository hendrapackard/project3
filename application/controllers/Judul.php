<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Judul extends MY_Controller
{


    public function index($page = null)
    {
        $juduls = $this->judul->getAllJudul($page);
        $main_view = 'judul/index';
        $this->load->view('template',compact( 'main_view', 'juduls'));
    }



    protected function isLogin()
    {
        $isLogin = $this->session->userdata('is_login');
        if(!$isLogin) {
            redirect(base_url());
        }
    }

    public function create()
    {
        $this->isLogin();

        if(!$_POST) {
            $input = (object)$this->judul->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null,true);
        }

        if (!empty($_FILES) && $_FILES['cover']['size'] > 0) {
            $coverFileName = date('YmdHis'); //Cover file name
            $upload = $this->judul->uploadCover('cover',$coverFileName);

            if ($upload) {
                $input->cover = "$coverFileName.jpg";
//                Data for column "cover"
                $this->judul->coverResize('cover',"./cover/$coverFileName.jpg",100,150);
            }
        }

        if (!$this->judul->validate() ||
            $this->form_validation->error_array()) {
            $main_view  = 'judul/form';
            $form_action = 'judul/create';
            $this->load->view('template',compact( 'main_view', 'form_action','input'));
            return;

        }

        if ($this->judul->insert($input)) {
            $this->session->set_flashdata('success','Data judul berhasil disimpan');
        } else {
            $this->session->set_flashdata('error','Data judul gagal disimpan');
        }
        redirect('judul');
    }

    public function isbn_unik()
    {
        $isbn   = $this->input->post('isbn',true);
        $id_judul = $this->input->post('id_judul',true);

        $this->judul->where('isbn',$isbn);
        !$id_judul || $this->judul->where('id_judul !=', $id_judul);
        $judul = $this->judul->get();

        if (count($judul)) {
            $this->form_validation->set_message('isbn_unik', '%s sudah digunakan');
            return false;
        }

        return true;
    }

    public function edit($id = null)
    {
        $this->isLogin();

        $judul = $this->judul->where('id_judul', $id)->get();
        if (!$judul) {
            $this->session->set_flashdata('warning','Data judul tidak ada');
            redirect('judul');
        }

        if (!$_POST) {
            $input = (object) $judul;
        } else {
            $input = (object) $this->input->post(null, true);
            $input->cover = $judul->cover;
            //set cover untuk preview
        }

        //upload new cover (if any)
        if(!empty($_FILES) && $_FILES['cover'] ['size'] > 0) {
            //upload new cover (if any)
            $coverFileName = date('YmdHis'); //Cover file name
            $upload = $this->judul->uploadCover('cover', $coverFileName);

//        Resize to 100x150px
            if ($upload) {
                $input->cover = "$coverFileName.jpg";
                $this->judul->coverResize('cover', "./cover/$coverFileName.jpg", 100, 150);

//            Delete old cover
                if ($judul->cover) {
                    $this->judul->deleteCover($judul->cover);
                }
            }
        }

        // Something Wrong
        if(!$this->judul->validate() ||
            $this->form_validation->error_array()) {
            $main_view = 'judul/form';
            $form_action = "judul/edit/$id";
            $this->load->view('template', compact('main_view','form_action','input'));
            return;
        }

        // Update data
        if ($this->judul->where('id_judul',$id)->update($input)) {
            $this->session->set_flashdata('success','Data judul berhasil diupdate');
        } else {
            $this->session->set_flashdata('error','Data judul gagal diupdate');
        }
        redirect('judul');
    }

    public function delete($id = null)
    {
        $this->isLogin();

        $judul = $this->judul->where('id_judul',$id)->get();
        if (!$judul) {
            $this->session->set_flashdata('warning', 'Data judul tidak ada.');
            redirect('judul');
        }

        if ($this->judul->where('id_judul',$id)->delete()) {
//            Delete cover
            $this->judul->deleteCover($judul->cover);
            $this->session->set_flashdata('success', 'Data judul berhasil dihapus');
        } else {
            $this->session->set_flashdata('error','Data judul gagal dihapus');
        }

        redirect('judul');
    }
}