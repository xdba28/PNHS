<?php
	class CMS_account {
		protected $cms_account_ID;
		protected $cms_priv_ID;
		public $cms_username;
		protected $cms_password;
		protected $cms_account_type;
		protected $cms_def_pass;
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

	class CMS_news {
		public $cms_news_ID;
		public $cms_account_ID;
		public $cms_news_title;
		public $cms_news_description;
		public $cms_news_date;

		function __construct($data = array()) {
			if(is_array($data)) {
				if(isset($data['cms_news_ID'])) {
					$this->cms_news_ID = $data['cms_news_ID'];
				}
				if(isset($data['cms_account_ID'])) {
					$this->cms_account_ID = $data['cms_account_ID'];
				}
				if(isset($data['cms_news_title'])) {
					$this->cms_news_title = $data['cms_news_title'];
				}
				if(isset($data['cms_news_description'])) {
					$this->cms_news_description = $data['cms_news_description'];
				}
				if(isset($data['cms_news_date'])) {
					$this->cms_news_date = $data['cms_news_date'];
				}
			}
		}

		function __set($name, $value) {
			switch ($name) {
				case 'cms_news_ID': $this->cms_news_ID = $value; break;
				case 'cms_account_ID': $this->cms_account_ID = $value; break;
				case 'cms_news_title': $this->cms_news_title = $value; break;
				case 'cms_news_description': $this->cms_news_description = $value; break;
				case 'cms_news_date': $this->cms_news_date = $value; break;
				default: break;
			}
		}

		function __get($name) {
			if(property_exists($this, $name)) {
				return $this->$name;
			}
		}
	}

	class CMS_privilige {
		protected $cms_priv_ID;
		protected $cms_priv;
		protected $frms_priv;
		protected $ims_priv;
		protected $ipcrms_priv;
		protected $oes_priv;
		protected $pms_priv;
		protected $pims_priv;
		protected $prs_priv;
		protected $css_priv;
		protected $scms_priv;
		protected $sis_priv;
		protected $memo_priv;
		protected $calendar_priv;
		protected $news_priv;
		protected $ach_priv;

		function __construct($data = array()) {
			if(is_array($data)) {
				if(isset($data['cms_priv_ID'])) {
					$this->cms_priv_ID = $data['cms_priv_ID'];
				}
				if(isset($data['cms_priv'])) {
					$this->cms_priv = $data['cms_priv'];
				}
				if(isset($data['frms_priv'])) {
					$this->frms_priv = $data['frms_priv'];
				}
				if(isset($data['ims_priv'])) {
					$this->ims_priv = $data['ims_priv'];
				}
				if(isset($data['ipcrms_priv'])) {
					$this->ipcrms_priv = $data['ipcrms_priv'];
				}
				if(isset($data['oes_priv'])) {
					$this->oes_priv = $data['oes_priv'];
				}
				if(isset($data['pms_priv'])) {
					$this->pms_priv = $data['pms_priv'];
				}
				if(isset($data['pims_priv'])) {
					$this->pims_priv = $data['pims_priv'];
				}
				if(isset($data['prs_priv'])) {
					$this->prs_priv = $data['prs_priv'];
				}
				if(isset($data['css_priv'])) {
					$this->css_priv = $data['css_priv'];
				}
				if(isset($data['scms_priv'])) {
					$this->scms_priv = $data['scms_priv'];
				}
				if(isset($data['sis_priv'])) {
					$this->sis_priv = $data['sis_priv'];
				}
				if(isset($data['memo_priv'])) {
					$this->memo_priv = $data['memo_priv'];
				}
				if(isset($data['calendar_priv'])) {
					$this->calendar_priv = $data['calendar_priv'];
				}
				if(isset($data['news_priv'])) {
					$this->news_priv = $data['news_priv'];
				}
				if(isset($data['ach_priv'])) {
					$this->ach_priv = $data['ach_priv'];
				}
			}
		}

		function __set($name, $value) {
			switch ($name) {
				case 'cms_priv_ID': $this->cms_priv_ID = $value; break;
				case 'cms_priv': $this->cms_priv = $value; break;
				case 'frms_priv': $this->frms_priv = $value; break;
				case 'ims_priv': $this->ims_priv = $value; break;
				case 'ipcrms_priv': $this->ipcrms_priv = $value; break;
				case 'oes_priv': $this->oes_priv = $value; break;
				case 'pms_priv': $this->pms_priv = $value; break;
				case 'pims_priv': $this->pims_priv = $value; break;
				case 'prs_priv': $this->prs_priv = $value; break;
				case 'css_priv': $this->css_priv = $value; break;
				case 'scms_priv': $this->scms_priv = $value; break;
				case 'sis_priv': $this->sis_priv = $value; break;
				case 'memo_priv': $this->memo_priv = $value; break;
				case 'calendar_priv': $this->calendar_priv = $value; break;
				case 'news_priv': $this->news_priv = $value; break;
				case 'ach_priv': $this->ach_priv = $value; break;
				default: break;
			}
		}

		function __get($name) {
			if(property_exists($this, $name)) {
				return $this->$name;
			}
		}
	}

	class CMS_memo {
		public $cms_memo_ID;
		public $cms_account_ID;
		public $cms_subject;
		public $cms_memo_description;
		public $cms_memo_date;
		public $cms_recipient;

		function __construct($data = array()) {
			if(is_array($data)) {
				if(isset($data['cms_memo_ID'])) {
					$this->cms_memo_ID = $data['cms_memo_ID'];
				}
				if(isset($data['cms_account_ID'])) {
					$this->cms_account_ID = $data['cms_account_ID'];
				}
				if(isset($data['cms_subject'])) {
					$this->cms_subject = $data['cms_subject'];
				}
				if(isset($data['cms_memo_description'])) {
					$this->cms_memo_description = $data['cms_memo_description'];
				}
				if(isset($data['cms_memo_date'])) {
					$this->cms_memo_date = $data['cms_memo_date'];
				}
				if(isset($data['cms_recipient'])) {
					$this->cms_recipient = $data['cms_recipient'];
				}
			}
		}

		function __set($name, $value) {
			switch ($name) {
				case 'cms_memo_ID': $this->cms_memo_ID = $value; break;
				case 'cms_account_ID': $this->cms_account_ID = $value; break;
				case 'cms_subject': $this->cms_subject = $value; break;
				case 'cms_memo_description': $this->cms_memo_description = $value; break;
				case 'cms_memo_date': $this->cms_memo_date = $value; break;
				case 'cms_recipient': $this->cms_recipient = $value; break;
				default: break;
			}
		}

		function __get($name) {
			if(property_exists($this, $name)) {
				return $this->$name;
			}
		}
	}

	class CMS_calendar {
		public $cms_calendar_ID;
		public $cms_account_ID;
		public $cms_calendar_name;
		public $cms_about;
		public $cms_calendar_date;
		public $cms_personinvolved;

		function __construct($data = array()) {
			if(is_array($data)) {
				if(isset($data['cms_calendar_ID'])) {
					$this->cms_calendar_ID = $data['cms_calendar_ID'];
				}
				if(isset($data['cms_account_ID'])) {
					$this->cms_account_ID = $data['cms_account_ID'];
				}
				if(isset($data['cms_calendar_name'])) {
					$this->cms_calendar_name = $data['cms_calendar_name'];
				}
				if(isset($data['cms_about'])) {
					$this->cms_about = $data['cms_about'];
				}
				if(isset($data['cms_calendar_date'])) {
					$this->cms_calendar_date = $data['cms_calendar_date'];
				}
				if(isset($data['cms_personinvolved'])) {
					$this->cms_personinvolved = $data['cms_personinvolved'];
				}
			}
		}

		function __set($name, $value) {
			switch ($name) {
				case 'cms_calendar_ID': $this->cms_calendar_ID = $value; break;
				case 'cms_account_ID': $this->cms_account_ID = $value; break;
				case 'cms_calendar_name': $this->cms_calendar_name = $value; break;
				case 'cms_about': $this->cms_about = $value; break;
				case 'cms_calendar_date': $this->cms_calendar_date = $value; break;
				case 'cms_personinvolved': $this->cms_personinvolved = $value; break;
				default: break;
			}
		}

		function __get($name) {
			if(property_exists($this, $name)) {
				return $this->$name;
			}
		}
	}

	class CMS_achievement {
		public $cms_achievement_ID;
		public $cms_account_ID;
		public $cms_achievement_name;
		public $cms_achievement_about;
		public $cms_achievement_date;

		function __construct($data = array()) {
			if(is_array($data)) {
				if(isset($data['cms_achievement_ID'])) {
					$this->cms_achievement_ID = $data['cms_achievement_ID'];
				}
				if(isset($data['cms_account_ID'])) {
					$this->cms_account_ID = $data['cms_account_ID'];
				}
				if(isset($data['cms_achievement_name'])) {
					$this->cms_achievement_name = $data['cms_achievement_name'];
				}
				if(isset($data['cms_achievement_about'])) {
					$this->cms_achievement_about = $data['cms_achievement_about'];
				}
				if(isset($data['cms_achievement_date'])) {
					$this->cms_achievement_date = $data['cms_achievement_date'];
				}
			}
		}

		function __set($name, $value) {
			switch ($name) {
				case 'cms_achievement_ID': $this->cms_achievement_ID = $value; break;
				case 'cms_account_ID': $this->cms_account_ID = $value; break;
				case 'cms_achievement_name': $this->cms_achievement_name = $value; break;
				case 'cms_achievement_about': $this->cms_achievement_about = $value; break;
				case 'cms_achievement_date': $this->cms_achievement_date = $value; break;
				default: break;
			}
		}

		function __get($name) {
			if(property_exists($this, $name)) {
				return $this->$name;
			}
		}
	}

	class CMS_event {
		public $cms_event_ID;
		public $cms_account_ID;
		public $cms_event_name;
		public $cms_event_about;
		public $cms_event_date;

		function __construct($data = array()) {
			if(is_array($data)) {
				if(isset($data['cms_event_ID'])) {
					$this->cms_event_ID = $data['cms_event_ID'];
				}
				if(isset($data['cms_account_ID'])) {
					$this->cms_account_ID = $data['cms_account_ID'];
				}
				if(isset($data['cms_event_name'])) {
					$this->cms_event_name = $data['cms_event_name'];
				}
				if(isset($data['cms_event_about'])) {
					$this->cms_event_about = $data['cms_event_about'];
				}
				if(isset($data['cms_event_date'])) {
					$this->cms_event_date = $data['cms_event_date'];
				}
			}
		}

		function __set($name, $value) {
			switch ($name) {
				case 'cms_event_ID': $this->cms_event_ID = $value; break;
				case 'cms_account_ID': $this->cms_account_ID = $value; break;
				case 'cms_event_name': $this->cms_event_name = $value; break;
				case 'cms_event_about': $this->cms_event_about = $value; break;
				case 'cms_event_date': $this->cms_event_date = $value; break;
				default: break;
			}
		}

		function __get($name) {
			if(property_exists($this, $name)) {
				return $this->$name;
			}
		}
	}
	/*
	protected $cms_account_ID;
	protected $cms_priv_ID;
	public $cms_username;
	protected $cms_password;
	protected $cms_account_type;
	protected $cms_def_pass;
	public $emp_no;
	public $lrn;
	*/
	ob_start();
	session_start();
	$_SESSION['data'] = new CMS_account($data = array('cms_account_ID' => 1, 'cms_priv_ID' => 1, 'cms_username' => 'Val Harris'));
	echo "<br>".var_export($_SESSION['data'], TRUE);
	echo "<br>".$_SESSION['data']->cms_username;
?>