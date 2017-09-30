<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian_user extends Anggota_Controller
{

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $peminjaman = $this->pengembalian_user->getAllPeminjaman($id_user);
        $main_view  = 'pengembalian/index_user';
        $form_action = 'pengembalian_user';
        $this->load->view('template',compact('main_view','form_action','input','first_load','peminjaman'));
    }

    public function kembalikan()
    {
        $id_pinjam = $this->input->post('id_pinjam');
        $denda      = $this->input->post('denda');

        //Kembalikan
        $this->pengembalian_user->kembalikan($id_pinjam,$denda);


        $this->session->set_flashdata('success','Pengembalian Buku Berhasil Diajukan');
        redirect('pengembalian_user');
    }
}