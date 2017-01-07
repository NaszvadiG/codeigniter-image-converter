<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Actl_model
 *
 * @author grayrattus
 */
class Actl_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function autorize() {
		if (!isset($_POST['login']) || !isset($_POST['password']))
			return FALSE;
		else {
			$login = $_POST['login'];
			$password = $_POST['password'];
			$this->load->database();

			$row = $this->db->select('Id, username, password, email')
					->from('Users')
					->where('username', $login)
					->where('password', $password)
					->get()->row();


			if (is_object($row)) {
				$this->load->library('session');
				$_SESSION['Id'] = $row->Id;
				$_SESSION['username'] = $row->username;
				$_SESSION['email'] = $row->email;

				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

}
