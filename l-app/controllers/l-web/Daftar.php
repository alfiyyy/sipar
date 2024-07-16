<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends Web_Controller {

    public $mod = 'daftar';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('web/home_model');
        $this->load->model('web/daftar_model');
        $this->load->model('web/Index_model');
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    public function index()
    {
        $this->meta_title(get_setting('web_name').' - '.get_setting('web_slogan'));

        if ($this->input->method() == 'post')
        {
            $this->form_validation->set_rules(array(
                array(
                    'field' => 'nip',
                    'label' => 'NIP',
                    'rules' => 'trim|required|is_unique[t_user.nip]'
                ),
                array(
                    'field' => 'name',
                    'label' => 'Nama Lengkap',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'asal_instansi',
                    'label' => 'Asal Instansi',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'trim|required|valid_email'
                ),
                array(
                    'field' => 'address',
                    'label' => 'Alamat',
                    'rules' => 'trim'
                ),
                array(
                    'field' => 'tlpn',
                    'label' => 'Telp',
                    'rules' => 'trim'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'trim|required|min_length[6]'
                ),
                array(
                    'field' => 'confirm_password',
                    'label' => 'Konfirmasi Password',
                    'rules' => 'trim|required|matches[password]'
                )
            ));

            if ($this->form_validation->run())
            {
                $data_insert = array(
                    'nip' => xss_filter($this->input->post('nip')),
                    'username' => xss_filter($this->input->post('nip')),
                    'email' => xss_filter($this->input->post('email')),
                    'name' => xss_filter($this->input->post('name')),
                    'address' => xss_filter($this->input->post('address')),
                    'tlpn' => xss_filter($this->input->post('tlpn')),
                    'instansi' => xss_filter($this->input->post('asal_instansi')),
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'key_group' => 'peserta',
                    'active' => 'Y',
                );

                if ($this->daftar_model->insert($data_insert))
                {
                    // Success response
                    $response['success'] = true;
                    $response['message'] = 'Data has been successfully added.';
                }
                else
                {
                    // Error response
                    $response['success'] = false;
                    $response['message'] = 'Failed to add data. Please check your input.';
                }
            }
            else
            {
                // Validation error response
                $response['success'] = false;
                $response['validation_errors'] = validation_errors();
            }

            // Output JSON response
            echo json_encode($response);
            return;
        }

        $this->render_view('daftar');
    }

    public function getDataDetailRoom()
    {
        $id = $this->input->get('id');
        $kamar = $this->Index_model->get_data_detail($id);
        $fasilitas = $this->Index_model->get_data_fasilitas($id);
        $layanan = $this->Index_model->get_data_layanan($id);
        $gambar = $this->Index_model->get_data_gambar_room($id);

        echo json_encode(array(
            "dataGambar"    => $gambar->result_array(),
            "dataKamar"     => $kamar,
            "dataFasilitas" => $fasilitas->result_array(),
            "dataLayanan"   => $layanan->result_array()
        ));
    }
}
?>
