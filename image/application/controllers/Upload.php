<?php

class Upload extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index() {
		$this->load->view('upload', array('error' => ' '));
	}

	public function do_upload() {
		$config['upload_path'] = 'public/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 10000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload', $error);
		} else {
			$data = array('upload_data' => $this->upload->data());

			$this->convert($data, $_POST);

			//$this->load->view('upload_success', $data);
		}
	}

	private function convert($aImgData, $aOperations) {

		echo '<pre>';
		var_dump($aImgData);
		var_dump($aOperations);
		echo '</pre>';

		$this->load->library('mogrify');

		$newFileName = $this->mogrify->convert($aImgData, $aOperations);
		$this->load->helper('url');

		redirect('/public/images/'.$newFileName);
		echo $newFileName;

		//$convertParams = array_merge($aImgPath, $aOperations);
	}

}

?>