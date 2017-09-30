<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Approve_pinjam_model extends MY_Model
{
    protected $table        = 'peminjaman';
    public function getAllPeminjaman($page = null)
    {

        $sql = "  SELECT id_pinjam,
                         kode_pinjam,
                         tanggal_pinjam,
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
            WHERE         status = '1'
            ORDER BY      peminjaman.tanggal_pinjam DESC, peminjaman.id_pinjam DESC";


        return $this->db->query($sql)->result();
    }

    public function ubahStatusBuku($id_buku, $status)
    {
        $this->db->where('id_buku',$id_buku);
        $this->db->update('buku',['is_ada' => $status]);
    }

    public function ubahStatusPinjam($id_pinjam, $status)
    {
        $this->db->where('id_pinjam',$id_pinjam);
        $this->db->update('peminjaman',['status' => $status]);
    }

}