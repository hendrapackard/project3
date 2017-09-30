<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian_user_model extends MY_Model
{
    protected $table = 'peminjaman';
    protected $maxLama = 3; // Lama maksimum peminjaman
    protected $dendaPerHari = 500;

    public function getAllPeminjaman($id_user)
    {
        $currentDate = (string)date('Y-m-d');

        $sql = "SELECT      id_pinjam,
                            tanggal_pinjam,
                            no_induk,
                            nama,
                            nama_kelas,
                            kode_buku,
                            judul_buku,
                            IF (
                            DATEDIFF('$currentDate', tanggal_pinjam) > $this->maxLama,
                            (DATEDIFF('$currentDate',tanggal_pinjam) - $this->maxLama) * $this->dendaPerHari,
                            0
                            ) AS denda
               FROM         peminjaman
               INNER JOIN   user
               ON           (peminjaman.id_user = user.id_user)
               INNER JOIN   kelas
               ON           (user.id_kelas = kelas.id_kelas)
               INNER JOIN    buku
               ON           (buku.id_buku = peminjaman.id_buku)
               INNER JOIN   judul
               ON           (buku.id_judul = judul.id_judul)
               AND          (peminjaman.id_buku = buku.id_buku)
               WHERE        user.id_user = '$id_user'
               AND          (status = '2')";

        return $this->db->query($sql)->result();
    }


    //untuk anggota
    public function kembalikan($id_pinjam, $denda)
    {

        //Set pengembalian
        $data = [
            'status' => '3',
        ];
        return $this->db->where('id_pinjam', $id_pinjam)->update($this->table, $data);
    }

}