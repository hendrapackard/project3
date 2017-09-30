<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Approve_pinjam extends Admin_Controller
{

    public function index($page = null)
    {
        $approve_pinjam = $this->approve_pinjam->getAllPeminjaman($page);
        $main_view  = 'approve_pinjam/index';
        $this->load->view('template',compact( 'main_view', 'approve_pinjam'));
    }

    public function approve($id = null)
    {
        $approve = $this->approve_pinjam->where('id_pinjam',$id)->get();
        if (!$approve) {
            $this->session->set_flashdata('warning','Data peminjaman tidak ada');
            redirect('approve-pinjam');
        }

        $this->approve_pinjam->ubahStatusPinjam($approve->id_pinjam, '2');


        $this->session->set_flashdata('success','Data peminjaman berhasil diapprove');

        redirect('approve-pinjam');
    }

    public function reject($id = null)
    {
        $approve = $this->approve_pinjam->where('id_pinjam',$id)->get();
        if (!$approve) {
            $this->session->set_flashdata('warning','Data peminjaman tidak ada');
            redirect('approve-pinjam');
        }

        $this->approve_pinjam->where('id_pinjam',$id)->delete();
        $this->approve_pinjam->ubahStatusBuku($approve->id_buku, 'y');


        $this->session->set_flashdata('error','Data peminjaman berhasil direject');

        redirect('approve-pinjam');
    }

}
