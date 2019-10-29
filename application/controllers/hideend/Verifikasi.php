<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* @property PhpWord_model $PhpWord_model */


class Verifikasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("content_model");
		$this->load->model("forex_model");
		$this->load->model("user_model");
		$this->load->model("pengajuan_model");
		$this->load->model("verifikasi_model");
		if (!$this->user->loggedin) redirect(site_url("hideend/login"));
		if(!$this->common->has_permissions(array(
				"admin", "content_manager", "content_worker","admin_members"), $this->user)) {
				$this->template->error(lang("error_81"));
		}
	}

		public function status()
	{
		$this->template->loadData("activeLink",
			array("content" => array("general" => 1)));

		$vueComponent = $this->load->view("hidepage/vue/ComponentPspBMNVerifikasiWizard.js",'',true);
		$this->template->loadExternal(
			'<link rel="stylesheet" href="https://unpkg.com/vue-form-wizard/dist/vue-form-wizard.min.css">'.
			'<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">'.
			'<link rel="stylesheet" href="https://unpkg.com/vue-airbnb-style-datepicker@latest/dist/vue-airbnb-style-datepicker.min.css">'
			);

		$this->template->loadExternalJs(
			'<script src="https://unpkg.com/vue-form-wizard/dist/vue-form-wizard.js"></script>'.
			'<script src="https://cdn.jsdelivr.net/npm/vue-the-mask@0.11.1/dist/vue-the-mask.min.js"></script>'.
			'<script src="https://unpkg.com/vee-validate@2.0.0-rc.21/dist/vee-validate.js"></script>'.
			'<script src="https://unpkg.com/vue-multiselect@2.1.6/dist/vue-multiselect.min.js"></script>'.
			'<script src="'.$this->common->theme_hideend().'plugins/js/vue-airbnb-style-datepicker.min.js"></script>'.
			'<script src="'.$this->common->theme_hideend().'plugins/js/date_fns.js"></script>'.
			$vueComponent.
			'<script src="'.$this->common->theme_hideend().'plugins/js/appStatusVerifikasi.js"></script>'.
			'<script src="'.$this->common->theme_hideend().'plugins/js/appStatusVerifikasiKANWIL.js"></script>'.
			'<script src="'.$this->common->theme_hideend().'plugins/js/appStatusVerifikasiKPKNL.js"></script>'
			);
		$this->template->loadContent("hidepage/verifikasi/status.php", array(
			)
		);
	}





	
	


}

?>
