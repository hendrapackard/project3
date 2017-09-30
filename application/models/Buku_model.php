<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends MY_Model
{
    protected $table = 'buku';

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'kode_buku',
                'label' => 'Kode Buku',
                'rules' => "trim|required|min_length[1]|max_length[11]|callback_alpha_numeric_coma_dash_dot_space"
            ]
        ];

        return $validationRules;
    }

    public function getDefaultValues()
    {
        return[
            'kode_buku' => ''
        ];
    }

    public function total($id_judul)
    {
        $sql = "    SELECT id_buku,
                           kode_buku,
                           judul_buku,
                           penulis,
                           penerbit,
                           is_ada
                    FROM buku
                    INNER JOIN judul
                            ON (judul.id_judul = buku.id_judul)
                            WHERE buku.id_judul = $id_judul";

        return $this->db->query($sql)->result();
    }

    public function ada($id_judul)
    {
        $sql = "    SELECT id_buku,
                           kode_buku,
                           judul_buku,
                           penulis,
                           penerbit
                    FROM   buku
                    INNER JOIN judul
                    ON         (judul.id_judul = buku.id_judul)
                    WHERE      buku.id_judul = $id_judul
                    AND is_ada = 'y' ";

        return $this->db->query($sql)->result();

    }

    public function dipinjam($id_judul)
    {
        $sql = " SELECT buku.id_buku,
                        kode_buku,
                        judul_buku,
                        penulis,
                        penerbit,
                        nama AS peminjam,
                        nama_kelas
                 FROM   buku
          INNER JOIN    judul
                ON      (judul.id_judul = buku.id_judul)
          INNER JOIN    peminjaman
                ON      (peminjaman.id_buku = buku.id_buku)
          INNER JOIN    user
                ON      (user.id_user = peminjaman.id_user)
          INNER JOIN    kelas
                ON      (kelas.id_kelas = user.id_kelas)
                WHERE   buku.id_judul = $id_judul
                AND     buku.is_ada = 'n'
                AND     peminjaman.status != '4'";

        return $this->db->query($sql)->result();
    }
}
