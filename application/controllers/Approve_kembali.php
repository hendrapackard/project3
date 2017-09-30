<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Approve_kembali extends Admin_Controller
{
    public function index()
    {
        if (!$_POST) {
            $input = (object) ['keywords' => ''];
            $first_load = true;
        } else {
            $input = (object) $this->input->post(null,true);
            $first_load = false;
        }

        $peminjaman = $this->approve_kembali->search($input->keywords);
        $main_view  = 'approve_kembali/index';
        $form_action = 'approve_kembali';
        $this->load->view('template',compact('main_view','form_action','input','first_load','peminjaman'));
    }

    public function kembalikan()
    {
        $id_pinjam = $this->input->post('id_pinjam');
        $denda      = $this->input->post('denda');

        //Kembalikan
        $this->approve_kembali->kembalikan($id_pinjam,$denda);

//        Set buku is ada =y
        $peminjaman = $this->approve_kembali->where('id_pinjam',$id_pinjam)->get();
        $this->approve_kembali->ubahStatusBuku($peminjaman->id_buku);

        $this->session->set_flashdata('success','Buku sudah dikembalikan');
        redirect('approve-kembali');
    }
}