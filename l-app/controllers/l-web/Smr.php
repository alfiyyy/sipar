<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Smr extends Web_controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('web/smr_model');
	}

	public function index()
	{
		$this->vars['all_gallery_image'] = $this->smr_model->all_smart_meeting_room();
		$this->vars['setba_gallery'] = $this->smr_model->setba();
		$this->vars['pusatPengembanganTalenta_gallery'] = $this->smr_model->pusatPengembanganTalenta();
		$this->vars['sumberDayaAir_gallery'] = $this->smr_model->sumberDayaAir();
		$this->vars['pengembanganKompentensiJalan_gallery'] = $this->smr_model->pengembanganKompentensiJalan();
		$this->vars['pengembanganKompentensiManajemen_gallery'] = $this->smr_model->pengembanganKompentensiManajemen();
		$this->vars['pengembanganKompentensiPUPR_Medan_gallery'] = $this->smr_model->pengembanganKompentensiPUPR_Medan();
		$this->vars['pengembanganKompentensiPUPR_Palembang_gallery'] = $this->smr_model->pengembanganKompentensiPUPR_Palembang();
		$this->vars['pengembanganKompentensiPUPR_Jakarta_gallery'] = $this->smr_model->pengembanganKompentensiPUPR_Jakarta();
		$this->vars['pengembanganKompentensiPUPR_Bandung_gallery'] = $this->smr_model->pengembanganKompentensiPUPR_Bandung();
		$this->vars['pengembanganKompentensiPUPR_Surabaya_gallery'] = $this->smr_model->pengembanganKompentensiPUPR_Surabaya();
		$this->vars['pengembanganKompentensiPUPR_Banjarmasin_gallery'] = $this->smr_model->pengembanganKompentensiPUPR_Banjarmasin();
		$this->vars['pengembanganKompentensiPUPR_Makassar_gallery'] = $this->smr_model->pengembanganKompentensiPUPR_Makassar();
		$this->vars['balaiPenilaianKompetensi_gallery'] = $this->smr_model->balaiPenilaianKompetensi();
		$this->meta_title('Smart Meeting Room - ' . get_setting('web_name'));
		$this->render_view('booking_smr');
	}
} // End class.