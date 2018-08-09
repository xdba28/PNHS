<?php
	class CMS_privilige {
		public $cms_priv_ID;
		public $cms_priv;
		public $frms_priv;
		public $ims_priv;
		public $ipcrms_priv;
		public $oes_priv;
		public $pms_priv;
		public $pims_priv;
		public $prs_priv;
		public $css_priv;
		public $scms_priv;
		public $sis_priv;
		public $memo_priv;
		public $calendar_priv;
		public $news_priv;
		public $ach_priv;

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
?>