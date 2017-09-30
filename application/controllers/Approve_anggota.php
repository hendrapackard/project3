<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Approve_anggota extends Admin_Controller
{

    public function index($page = null)
    {
        $approve_anggota = $this->approve_anggota->getAllAnggota($page);
        $main_view  = 'approve_anggota/index';
        $this->load->view('template',compact( 'main_view', 'approve_anggota'));
    }

    public function approve($id = null)
    {
        $approve = $this->approve_anggota->where('id_user',$id)->get();
        if (!$approve) {
            $this->session->set_flashdata('warning','Data anggota tidak ada');
            redirect('approve-anggota');
        }

        $this->approve_anggota->ubahStatus($approve->id_user, 'y');


        $this->session->set_flashdata('success','Data anggota baru berhasil diapprove');

        redirect('approve-anggota');
    }

    public function reject($id = null)
    {
        $approve = $this->approve_anggota->where('id_user',$id)->get();
        if (!$approve) {
            $this->session->set_flashdata('warning','Data anggota tidak ada');
            redirect('approve-anggota');
        }

        $this->approve_anggota->where('id_user',$id)->delete();


        $this->session->set_flashdata('error','Data anggota baru berhasil direject');

        redirect('approve-anggota');
    }

}
