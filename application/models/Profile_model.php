<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends MY_Model
{
    protected $table = 'user';

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
                'field' => 'passConf',
                'label' => 'Konfirmasi Password',
                'rules' => 'trim|matches[password]|callback_is_password_required|min_length[4]|max_length[50]'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required|max_length[30]|callback_alpha_coma_dash_dot_space'
            ],
            [
                'field' => 'no_hp',
                'label' => 'No Handphone',
                'rules' => 'trim|required|max_length[15]|numeric'
            ],
        ];

        return $validationRules;
    }

    public function getDefaultValues()
    {
        return [
            'username' => '',
            'password' => '',
            'nama' => '',
            'no_hp' => '',
        ];
    }

}