<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Approve_anggota_model extends MY_Model
{
    protected $table        = 'user';
    public function getAllAnggota($page = null)
    {

        $sql = "  SELECT id_user,
                         username,
                         no_induk,
                         nama,
                         jenis_kelamin,
                         no_hp,
                         nama_kelas
                  FROM   user
            INNER JOIN    kelas
            ON            (user.id_kelas = kelas.id_kelas)
            WHERE         is_verified = 'n'
            ORDER BY      nama";


        return $this->db->query($sql)->result();
    }


    public function ubahStatus($id_user, $status)
    {
        $this->db->where('id_user',$id_user);
        $this->db->update('user',['is_verified' => $status]);
    }

}