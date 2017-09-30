<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian_model extends MY_Model
{
    protected $table        = 'peminjaman';
    protected $maxLama      = 3; // Lama maksimum peminjaman
    protected $dendaPerHari = 500;

    public function search($keywords)
    {
        $currentDate = (string) date('Y-m-d');

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
               WHERE        (user.no_induk = '$keywords' OR user.nama LIKE '%$keywords%')
               AND          (status = '2')";

        return $this->db->query($sql)->result();
    }

    //untuk admin
    public function kembalikan($id_pinjam, $denda)
    {
        // Insert denda
        if ((int) $denda > 0) {
            $this->db->insert('denda',[
                'id_pinjam'     => $id_pinjam,
                'jumlah'        => $denda,
                'tanggal_pembayaran' => date('Y-m-d'),
                'is_dibayar'         => 'y'
            ]);
        }

        //Set pengembalian
        $data = [
            'status' => '4',
            'tanggal_kembali' => date('Y-m-d')
        ];
        return $this->db->where('id_pinjam', $id_pinjam)->update($this->table, $data);
    }


    public function ubahStatusBuku($id_buku)
    {
        return $this->db->where('id_buku',$id_buku)
            ->update('buku',['is_ada' => 'y']);
    }
}