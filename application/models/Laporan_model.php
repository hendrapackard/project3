<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends MY_Model
{
    public function laporanBuku()
    {
        $sql = "SELECT  judul.id_judul,
                        judul.judul_buku,
                        judul.isbn,
                        judul.penulis,
                        judul.penerbit,
                        IFNULL((SELECT COUNT(buku.id_buku)
                                FROM buku
                                WHERE buku.id_judul = judul.id_judul
                                GROUP BY buku.id_judul), 0) AS jumlah
                   FROM judul
               GROUP BY judul.id_judul
               ORDER BY judul.judul_buku";

        return $this->db->query($sql)->result();
    }

    public function laporanAnggota()
    {
        $sql = "SELECT  user.id_user,
                          user.nama,
                          user.no_induk,
                          user.jenis_kelamin,
                          user.no_hp,
                          kelas.nama_kelas
                        
                        FROM user
                        INNER JOIN kelas
                        ON (user.id_kelas = kelas.id_kelas)
                        WHERE user.level = 'anggota'
                        AND user.is_verified = 'y'
                        ORDER BY user.nama";

        return $this->db->query($sql)->result();
    }

    public function laporanPeminjaman($tanggal_awal, $tanggal_akhir)
    {
        $sql = "   SELECT peminjaman.tanggal_pinjam,
                          user.no_induk,
                          user.nama,
                          buku.kode_buku,
                          judul.judul_buku,
                          peminjaman.id_pinjam
                     FROM peminjaman
               INNER JOIN buku
                       ON (peminjaman.id_buku = buku.id_buku)
               INNER JOIN judul
                       ON (buku.id_judul = judul.id_judul)
               INNER JOIN user
                       ON (peminjaman.id_user = user.id_user)
                    WHERE (peminjaman.tanggal_pinjam BETWEEN '$tanggal_awal' AND '$tanggal_akhir')
                 ORDER BY peminjaman.tanggal_pinjam ASC";

        return $this->db->query($sql)->result();
    }

    public function laporanPengembalian($tanggal_awal, $tanggal_akhir)
    {
        $sql = "   SELECT peminjaman.tanggal_kembali,
                        user.no_induk,
                        user.nama,
                        buku.kode_buku,
                        judul.judul_buku,
                        peminjaman.id_pinjam
                   FROM peminjaman
             INNER JOIN buku
                     ON (peminjaman.id_buku = buku.id_buku)
             INNER JOIN judul
                     ON (buku.id_judul = judul.id_judul)
             INNER JOIN user
                     ON (peminjaman.id_user = user.id_user)
                  WHERE (peminjaman.tanggal_kembali BETWEEN '$tanggal_awal' AND '$tanggal_akhir')
                    AND peminjaman.status = '4'
               ORDER BY peminjaman.tanggal_kembali ASC";

        return $this->db->query($sql)->result();
    }

    public function laporanDenda($tanggal_awal, $tanggal_akhir)
    {
        $sql = " SELECT no_induk,
                        nama,
                        jumlah,
                        tanggal_pembayaran
                   FROM user
             INNER JOIN peminjaman
                     ON (peminjaman.id_user = user.id_user)
             INNER JOIN denda
                     ON (denda.id_pinjam = peminjaman.id_pinjam)
                  WHERE denda.tanggal_pembayaran BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                    AND denda.is_dibayar = 'y'
               ORDER BY denda.id_pinjam ASC  ";

        return $this->db->query($sql)->result();
    }

    public function laporanDendaTotal($tanggal_awal, $tanggal_akhir)
    {
        $sql = "   SELECT SUM(jumlah) AS jumlah_total
                     FROM denda
                    WHERE denda.tanggal_pembayaran BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                      AND is_dibayar = 'y' ";
        return $this->db->query($sql)->row();
    }
}
