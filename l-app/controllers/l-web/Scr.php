<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Scr extends Web_controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('web/scr_model');
	}
	
	public function index()
	{
		$this->vars['all_gallery_image'] = $this->scr_model->all_smart_meeting_room();
		$this->vars['pusatPengembangTalenta'] = $this->scr_model->pusatPengembangTalenta();
		$this->vars['balaiPegembanganKompetensiPUPR_Medan'] = $this->scr_model->balaiPegembanganKompetensiPUPR_Medan();
		$this->vars['balaiPegembanganKompetensiPUPR_Palembang'] = $this->scr_model->balaiPegembanganKompetensiPUPR_Palembang();
		$this->vars['balaiPegembanganKompetensiPUPR_Jakarta'] = $this->scr_model->balaiPegembanganKompetensiPUPR_Jakarta();
		$this->vars['balaiPegembanganKompetensiPUPR_Bandung'] = $this->scr_model->balaiPegembanganKompetensiPUPR_Bandung();
		$this->vars['balaiPegembanganKompetensiPUPR_Surabaya'] = $this->scr_model->balaiPegembanganKompetensiPUPR_Surabaya();
		$this->vars['balaiPegembanganKompetensiPUPR_Banjarmasin'] = $this->scr_model->balaiPegembanganKompetensiPUPR_Banjarmasin();
		$this->vars['balaiPegembanganKompetensiPUPR_Makassar'] = $this->scr_model->balaiPegembanganKompetensiPUPR_Makassar();
		$this->meta_title('Smart Meeting Room - '.get_setting('web_name'));
		$this->render_view('booking_scr');
	}
} // End class.