<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends Admin_Controller
{

    public function index($page = null)
    {
        $peminjaman = $this->peminjaman->getAllPeminjaman($page);
        $main_view  = 'peminjaman/index';
        $this->load->view('template',compact( 'main_view', 'peminjaman'));
    }

    public function create()
    {
        if (!$_POST){
            $input = (object) $this->peminjaman->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null,true);
        }

        if (!$this->peminjaman->validate()) {
            $main_view = 'peminjaman/form';
            $form_action = 'peminjaman/create';

            $this->load->view('template',compact( 'main_view', 'form_action', 'input'));
            return;
        }

//        Cek, melebihi jumlah maksimum
        $id_user = $this->input->post('id_user');
        if (!$this->peminjaman->cekMaxItem($id_user)) {
            $this->session->set_flashdata('error','Tidak boleh meminjam lebih dari 2 buku!');
            redirect('peminjaman');
            return;
        }

//        If validate, unset search_user and search_buku
//        We dont need these items to save to database
        unset($input->search_user);
        unset($input->search_buku);

        if ($this->peminjaman->insert($input)) {


            //Ubah status "is_ada" -> n
            $this->peminjaman->ubahStatusBuku($input->id_buku, 'n');


            $this->session->set_flashdata('success', 'Data peminjaman berhasil disimpan');
        } else {

            $this->session->set_flashdata('error','Data peminjaman gagal disimpan');
        }

        redirect('peminjaman/index');
    }

//    Live search for user
    public function user_auto_complete()
    {
        $keywords = $this->input->post('keywords');
        $users = $this->peminjaman->liveSearchUser($keywords);

        foreach ($users as $user) {
            // Put in bold the written text.
            $no_induk    = str_replace($keywords, '<strong>'.$keywords.'</strong>', $user->no_induk);
            $nama_user = preg_replace("#($keywords)#i", "<strong>$1</strong>", $user->nama);

//        Add new option
            $str = '<li onclick="setItemUser(\''.$user->nama.'\'); makeHiddenIdUser(\''.$user->id_user.'\')">';
            $str .= "$no_induk - $nama_user";
            $str .= "</li>";

            echo $str;
        }
    }

//Live search for buku
    public function buku_auto_complete()
    {
        $keywords = $this->input->post('keywords');
        $bukus = $this->peminjaman->liveSearchBuku($keywords);

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
