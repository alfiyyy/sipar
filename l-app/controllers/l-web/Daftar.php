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
	}
	

	public function index()
	{
		$this->meta_title(get_setting('web_name').' - '.get_setting('web_slogan'));

        if ($this->input->method() == 'post')
        {
            $this->form_validation->set_rules(array(array(
                'field' => 'nip',
                'label' => 'NIP',
                'rules' => 'trim|required|is_unique[t_user.nip]'
            )));

            $this->form_validation->set_rules(array(array(
                'field' => 'name',
                'label' => 'Nama Lengkap',
                'rules' => 'trim'
            )));

            $this->form_validation->set_rules(array(array(
                'field' => 'asal_instansi',
                'label' => 'Asal Instansi',
                'rules' => 'trim'
            )));

            $this->form_validation->set_rules(array(array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim'
            )));

            $this->form_validation->set_rules(array(array(
                'field' => 'address',
                'label' => 'Alamat',
                'rules' => 'trim'
            )));

            $this->form_validation->set_rules(array(array(
                'field' => 'tlpn',
                'label' => 'Telp',
                'rules' => 'trim'
            )));

            if ($this->form_validation->run())
            {
                // $data_isert = array(
                //     'nip' => xss_filter($this->input->post('nip')),
                //     'username' => xss_filter($this->input->post('nip')),
                //     'email' => xss_filter($this->input->post('email')),
                //     'name' => xss_filter($this->input->post('name')),
                //     'address' => xss_filter($this->input->post('address')),
                //     'tlpn' => xss_filter($this->input->post('tlpn')),
                //     'instansi' => xss_filter($this->input->post('asal_instansi')),
                //     'password' => encrypt(xss_filter($this->input->post('nip'))),
                //     'key_group' => 'peserta',
                //     'active' => 'Y',
                // );

                $data_isert = array(
                    'nip' => xss_filter($this->input->post('nip')),
                    'username' => xss_filter($this->input->post('nip')),
                    'email' => xss_filter($this->input->post('email')),
                    'name' => xss_filter($this->input->post('name')),
                    'address' => xss_filter($this->input->post('address')),
                    'tlpn' => xss_filter($this->input->post('tlpn')),
                    'instansi' => xss_filter($this->input->post('asal_instansi')),
                    'key_group' => 'peserta',
                    'active' => 'Y',
                );

                if ($this->daftar_model->insert($data_isert))
                {
                    $this->cifire_alert->set('daftar', 'info', 'Data has been successfully added');
                    //redirect(selft_url());
                }
                else
                {
                    $this->cifire_alert->set('daftar', 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
                }
                
            }
        }
        else
        {
            //$this->render_view('daftar');
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

} // End Class