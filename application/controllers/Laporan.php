<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends Admin_Controller
{
    public function laporan_buku()
    {
        $bukus = $this->laporan->laporanBuku();
        $jumlah_total = count($bukus);
        $main_view = 'laporan/buku';
        $this->load->view('template', compact( 'main_view', 'bukus', 'jumlah_total'));
    }

    public function cetak_laporan_buku()
    {
        $bukus = $this->laporan->laporanBuku();
        $jumlah_total = count($bukus);

        // Template, return as string.
        $html = $this->load->view('laporan/buku_pdf', compact('bukus', 'jumlah_total'), true);

        // Cetak dengan html2pdf
        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
            $html2pdf->WriteHTML($html);
            $html2pdf->Output('laporan_buku_'.date('Ymd').'.pdf');
        } catch (HTML2PDF_exception $e) {
            // echo $e;
            $this->session->set_flashdata('error', 'Maaf, kami mengalami kendala teknis.');
            redirect('laporan-buku');
        }
    }
    public function laporan_anggota()
    {
        $anggotas = $this->laporan->laporanAnggota();
        $jumlah_total = count($anggotas);
        $main_view = 'laporan/anggota';
        $this->load->view('template', compact( 'main_view', 'anggotas', 'jumlah_total'));
    }

    public function cetak_laporan_anggota()
    {
        $anggotas = $this->laporan->laporanAnggota();
        $jumlah_total = count($anggotas);

        // Template, return as string.
        $html = $this->load->view('laporan/anggota_pdf', compact('anggotas', 'jumlah_total'), true);

        // Cetak dengan html2pdf
        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
            $html2pdf->WriteHTML($html);
            $html2pdf->Output('laporan_anggota_'.date('Ymd').'.pdf');
        } catch (HTML2PDF_exception $e) {
            // echo $e;
            $this->session->set_flashdata('error', 'Maaf, kami mengalami kendala teknis.');
            redirect('laporan-anggota');
        }
    }

    public function laporan_peminjaman()
    {
        if (!$_POST) {
            $input      = (object) ['tanggal_awal' => '', 'tanggal_akhir' => ''];
            $first_load = true;
        } else {
            $input         = (object) $this->input->post(null, true);
            $first_load    = false;
        }

        $peminjamans  = $this->laporan->laporanPeminjaman($input->tanggal_awal, $input->tanggal_akhir);
        $jumlah_total = count($peminjamans);
        $main_view    = 'laporan/peminjaman';
        $form_action  = 'laporan-peminjaman';
        $this->load->view('template', compact( 'main_view', 'input', 'peminjamans', 'jumlah_total', 'first_load', 'form_action'));
    }

    public function cetak_laporan_peminjaman($tanggal_awal, $tanggal_akhir)
    {
        $peminjamans  = $this->laporan->laporanPeminjaman($tanggal_awal, $tanggal_akhir);
        $jumlah_total = count($peminjamans);

        // Template, return as string.
        $html = $this->load->view('laporan/peminjaman_pdf', compact('peminjamans', 'jumlah_total'), true);

        // Cetak dengan html2pdf
        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
            $html2pdf->WriteHTML($html);
            $html2pdf->Output('laporan_peminjaman_'.date('Ymd').'.pdf');
        } catch (HTML2PDF_exception $e) {
            // echo $e;
            $this->session->set_flashdata('error', 'Maaf, kami mengalami kendala teknis.');
            redirect('laporan-pengembalian');
        }
    }

    public function laporan_pengembalian()
    {
        if (!$_POST) {
            $input      = (object) ['tanggal_awal' => '', 'tanggal_akhir' => ''];
            $first_load = true;
        } else {
            $input      = (object) $this->input->post(null, true);
            $first_load = false;
        }

        $pengembalians = $this->laporan->laporanPengembalian($input->tanggal_awal, $input->tanggal_akhir);
        $jumlah_total  = count($pengembalians);
        $main_view     = 'laporan/pengembalian';
        $form_action   = 'laporan-pengembalian';
        $this->load->view('template', compact('main_view', 'input', 'pengembalians', 'jumlah_total', 'first_load', 'form_action'));
    }

    public function cetak_laporan_pengembalian($tanggal_awal, $tanggal_akhir)
    {
        $pengembalians  = $this->laporan->laporanPengembalian($tanggal_awal, $tanggal_akhir);
        $jumlah_total = count($pengembalians);

        // Template, return as string.
        $html = $this->load->view('laporan/pengembalian_pdf', compact('pengembalians', 'jumlah_total'), true);

        // Cetak dengan html2pdf
        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
            $html2pdf->WriteHTML($html);
            $html2pdf->Output('laporan_pengembalian_'.date('Ymd').'.pdf');
        } catch (HTML2PDF_exception $e) {
            // echo $e;
            $this->session->set_flashdata('error', 'Maaf, kami mengalami kendala teknis.');
            redirect('laporan-pengembalian');
        }
    }

    public function laporan_denda()
    {
        if (!$_POST) {
            $input      = (object) ['tanggal_awal' => '', 'tanggal_akhir' => ''];
            $first_load = true;
        } else {
            $input         = (object) $this->input->post(null, true);
            $first_load    = false;
        }

        $dendas = $this->laporan->laporanDenda($input->tanggal_awal, $input->tanggal_akhir);
        $jumlah_total = $this->laporan->laporanDendaTotal($input->tanggal_awal, $input->tanggal_akhir)->jumlah_total;
        $main_view    = 'laporan/denda';
        $form_action  = 'laporan-denda';
        $this->load->view('template', compact('main_view', 'input', 'dendas', 'jumlah_total', 'first_load', 'form_action'));
    }

    public function cetak_laporan_denda($tanggal_awal, $tanggal_akhir)
    {
        $dendas  = $this->laporan->laporanDenda($tanggal_awal, $tanggal_akhir);
        $jumlah_total = $this->laporan->laporanDendaTotal($tanggal_awal, $tanggal_akhir)->jumlah_total;

        // Template, return as string.
        $html = $this->load->view('laporan/denda_pdf', compact('dendas', 'jumlah_total'), true);

        // Cetak dengan html2pdf
        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
            $html2pdf->WriteHTML($html);
            $html2pdf->Output('laporan_denda_'.date('Ymd').'.pdf');
        } catch (HTML2PDF_exception $e) {
            // echo $e;
            $this->session->set_flashdata('error', 'Maaf, kami mengalami kendala teknis.');
            redirect('laporan-denda');
        }
    }

}
