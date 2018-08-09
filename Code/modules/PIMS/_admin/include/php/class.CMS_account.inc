<?php
	class CMS_account {
		public $cms_account_ID;
		public $cms_priv_ID;
		public $cms_username;
		public $cms_password;
		public $cms_account_type;
		public $cms_def_pass;
		public $emp_no;
		public $lrn;

		function __construct($data = array()) {
			if(is_array($data)) {
				if(isset($data['cms_account_ID'])) {
					$this->cms_account_ID = $data['cms_account_ID'];
				}
				if(isset($data['cms_priv_ID'])) {
					$this->cms_priv_ID = $data['cms_priv_ID'];
				}
				if(isset($data['cms_username'])) {
					$this->cms_username = $data['cms_username'];
				}
				if(isset($data['cms_password'])) {
					$this->cms_password = $data['cms_password'];
				}
				if(isset($data['cms_account_type'])) {
					$this->cms_account_type = $data['cms_account_type'];
				}
				if(isset($data['cms_def_pass'])) {
					$this->cms_def_pass = $data['cms_def_pass'];
				}
				if(isset($data['emp_no'])) {
					$this->emp_no = $data['emp_no'];
				}
				if(isset($data['lrn'])) {
					$this->lrn = $data['lrn'];
				}
			}
		}

		function __set($name, $value) {
			switch ($name) {
				case 'cms_account_ID': $this->cms_account_ID = $value; break;
				case 'cms_priv_ID': $this->cms_priv_ID = $value; break;
				case 'cms_username': $this->cms_username = $value; break;
				case 'cms_password': $this->cms_password = $value; break;
				case 'cms_account_type': $this->cms_account_type = $value; break;
				case 'cms_def_pass': $this->cms_def_pass = $value; break;
				case 'emp_no': $this->emp_no = $value; break;
				case 'lrn': $this->lrn = $value; break;
				default: break;
			}
		}

		function __get($name) {
			if(property_exists($this, $name)) {
				return $this->$name;
			}
		}
	}
?>