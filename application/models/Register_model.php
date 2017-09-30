<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends MY_Model
{
    protected $table        = 'user';


    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[4]|max_length[30]|callback_username_unik'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|callback_is_password_required|min_length[4]|max_length[50]'
            ],
            [
                'field' => 'level',
                'label' => 'Level',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'no_induk',
                'label' => 'No Induk',
                'rules' => 'trim|required|numeric|max_length[20]|callback_no_induk_unik'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required|max_length[30]|callback_alpha_coma_dash_dot_space'
            ],
            [
                'field' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'no_hp',
                'label' => 'No Handphone',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'id_kelas',
                'label' => 'Kelas',
                'rules' => 'trim|required'
            ],
        ];

        return $validationRules;
    }

    public function getDefaultValues()
    {
        return [
            'username' => '',
            'password' => '',
            'level' => '',
            'no_induk' => '',
            'nama' => '',
            'jenis_kelamin' => '',
            'no_hp' => '',
            'id_kelas' => ''
        ];
    }

}