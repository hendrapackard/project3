<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_user extends Anggota_Controller
{


    public function index($page = null)
    {
        $id_user = $this->session->userdata('id_user');
        $peminjaman = $this->peminjaman_user->getAllPeminjaman($id_user);
        $main_view  = 'peminjaman/index_user';
        $this->load->view('template',compact( 'main_view', 'peminjaman'));
    }

    public function create()
    {
        if (!$_POST){
            $input = (object) $this->peminjaman_user->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null,true);
        }

        if (!$this->peminjaman_user->validate()) {
            $main_view = 'peminjaman/form_user';
            $form_action = 'peminjaman_user/create';

            $this->load->view('template',compact( 'main_view', 'form_action', 'input'));
            return;
        }

//        Cek, melebihi jumlah maksimum
        $id_user = $this->input->post('id_user');
        if (!$this->peminjaman_user->cekMaxItem($id_user)) {
            $this->session->set_flashdata('error','Tidak boleh meminjam lebih dari 2 buku!');
            redirect('peminjaman-user');
            return;
        }

//        If validate, unset search_user and search_buku
//        We dont need these items to save to database
        unset($input->search_buku);

        if ($this->peminjaman_user->insert($input)) {
            //Ubah status "is_ada" -> n
            $this->peminjaman_user->ubahStatusBuku($input->id_buku, 'n');

            $this->session->set_flashdata('success', 'Berhasil mengajukan peminjaman');
        } else {

            $this->session->set_flashdata('error','Gagal mengajukan peminjaman');
        }

        redirect('peminjaman-user');
    }

//Live search for buku
    public function buku_auto_complete()
    {
        $keywords = $this->input->post('keywords');
        $bukus = $this->peminjaman_user->liveSearchBuku($keywords);

        foreach ($bukus as $buku) {
//        Put in bold the written text
            $judul_buku = preg_replace("#($keywords)#i", "<strong>$1</strong>", $buku->judul_buku);

            // Add new option
            $str = '<li onclick="setItemBuku(\''.$buku->judul_buku.'\'); makeHiddenIdBuku(\''.$buku->id_buku.'\')">';
            $str .= $judul_buku;
            $str .= '</li>';

            echo $str;
        }
    }

    //Callback
    public function is_format_tanggal_valid($str)
    {
        if (!preg_match('/([0-9]{4})-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])/', $str)) {
            $this->form_validation->set_message('is_format_tanggal_valid','Format tanggal tidak valid. (yyyy-mm-dd)');
            return FALSE;
        }

        return TRUE;
    }

}
