<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_user_model extends MY_Model
{
    protected $maxItem = 2; //Jumlah maksimum buku
    protected $table        = 'peminjaman';

    public function getAllPeminjaman($id_user)
    {

        $sql = "  SELECT id_pinjam,
                         kode_pinjam,
                         tanggal_pinjam,
                         date(tanggal_pinjam+3) AS kembali,
                         no_induk,
                         nama,
                         nama_kelas,
                         kode_buku,
                         judul_buku,
                         status
                  FROM   peminjaman
            INNER JOIN   user
            ON            (peminjaman.id_user = user.id_user)
            INNER JOIN    kelas
            ON            (user.id_kelas = kelas.id_kelas)
            INNER JOIN    buku
            ON            (buku.id_buku = peminjaman.id_buku)
            INNER JOIN    judul
            ON            (buku.id_judul = judul.id_judul)
            AND           (peminjaman.id_buku = buku.id_buku)
            WHERE         user.id_user = '$id_user'
            ORDER BY      peminjaman.tanggal_pinjam DESC, peminjaman.id_pinjam DESC";


        return $this->db->query($sql)->result();
    }

    public function getAllPeminjamanCount()
    {
        return $this->db->query('SELECT COUNT(peminjaman.id_pinjam) AS jumlah FROM peminjaman')->row();
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'kode_pinjam',
                'label' => 'Kode_pinjam',
                'rules' => 'trim|required|numeric'
            ],
            [
                'field' => 'tanggal_pinjam',
                'label' => 'Tanggal_pinjam',
                'rules' => 'trim|required|callback_is_format_tanggal_valid'
            ],
            [
                'field' => 'id_user',
                'label' => 'ID User',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'search_buku',
                'label' => 'Buku',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'id_buku',
                'label' => 'ID Buku',
                'rules' => 'trim|required'
            ],
        ];

        return $validationRules;
    }

    public function getDefaultValues()
    {
        return [
            'kode_pinjam' => '',
            'tanggal_pinjam' => '',
            'id_user' => '',
            'id_buku' => '',
            'search_buku' => '',
        ];
    }

    public function ubahStatusBuku($id_buku, $status)
    {
        $this->db->where('id_buku',$id_buku);
        $this->db->update('buku',['is_ada' => $status]);
    }

    public function liveSearchBuku($keywords)
    {
        $sql = "    SELECT id_buku, judul_buku
                    FROM    buku
                    INNER JOIN judul
                    ON      (judul.id_judul = buku.id_judul)
                    WHERE   is_ada = 'y'
                    AND     judul_buku LIKE '%$keywords%'
                    GROUP BY  judul.id_judul #Otomatis pilih satu dari yang is_ada = 'y'
                    LIMIT 10 ";
        return $this->db->query($sql)->result();
    }

    public function cekMaxItem($id_user)
    {
        $sql = "SELECT COUNT(id_pinjam) AS jumlah_item
                FROM peminjaman
                WHERE id_user = '$id_user'
                AND status != '4'";
        $item = $this->db->query($sql)->row()->jumlah_item;

        if ($item < $this->maxItem) {
            return true;
        }

        return false;
    }


}