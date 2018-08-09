<?php
	class System {
		public $host;
		public $username;
		public $password;
		public $database;
		public $mysqli;
		public function __construct() {

		}
		public function __get($name) {
			if(is_string($name)) {
				if(property_exists($this, $name)) {
					return $this->$name;
				}
			}
			else {
				trigger_error("Class: System; Function: __get; Error: Arg not String;<br>");
			}
		}
		public function __set($var, $val) {
			switch ($var) {
				case "host": $this->host = $val; break;
				case "username": $this->username = $val; break;
				case "password": $this->password = $val; break;
				case "database": $this->database = $val; break;
				case "mysqli": $this->mysqli = $val; break;
				default: trigger_error("Unknown Attribute<br>"); break;
			}
		}
		public function connect($data = ["host"=>"localhost", "username"=>"root", "password"=>'', "database"=>"class_db9"]) {
			if(is_array($data)) {
				if(isset($data["host"])) {
					$this->host = $data["host"];
				}
				elseif(isset($data["username"])) {
					$this->username = $data["username"];
				}
				elseif(isset($data["password"])) {
					$this->password = $data["password"];
				}
				elseif(isset($data["database"])) {
					$this->database = $data["database"];
				}
				$this->host = $data["host"];
				$this->username = $data["username"];
				$this->password = $data["password"];
				$this->database = $data["database"];
				$this->mysqli = new mysqli($this->host, $this->username, $this->password, $this->database);
				if($this->mysqli->connect_errno) {
					//return $mysqli;
					trigger_error("Connection Failed".$this->mysqli->connect_error);
				}
				else {
					return "Connection Success<br>";
				}
			}
		}
		public function connectClose() {
			$this->mysqli->close();
		}
		public function displayHUPD() {
			return $this->host." ".$this->username." ".$this->password." ".$this->database."<br>";
		}
		public function getPHPVersion() {
			$version = explode("/", $_SERVER["SERVER_SOFTWARE"]);
			return $version[3];
		}
		public function attemptLogIn() {
			if(isset($_POST['u']) AND isset($_POST['p']) AND isset($_POST['login'])) {
				$username=$this->mysqli->real_escape_string(stripslashes(strip_tags($_POST['u'])));
				$password=$this->mysqli->real_escape_string(stripslashes(strip_tags($_POST['p'])));
				if($query_run=$this->mysqli->query("SELECT * FROM cms_account WHERE cms_username='$username' AND cms_password='$password'")) {
					$query_num_rows=$query_run->num_rows;
				}
				if($query_num_rows==1) {
					$data = $query_run->fetch_assoc();
					$id = $data['cms_account_ID'];
					ob_start();
					session_start();
					$_SESSION['user_data']['acct']['cms_account_ID'] = $data['cms_account_ID'];
					$_SESSION['user_data']['acct']['cms_username'] = $data['cms_username'];
					$_SESSION['user_data']['acct']['emp_no'] = $data['emp_no'];
					$_SESSION['user_data']['acct']['lrn'] = $data['lrn'];
					if($_SESSION['user_data']['acct']['lrn']==NULL AND !empty($_SESSION['user_data']['acct']['emp_no'])) {
						$emp_escape = $this->mysqli->real_escape_string($_SESSION['user_data']['acct']['emp_no']);
						$get_emp_query="SELECT pims_personnel.emp_No, pims_personnel.P_fname, pims_personnel.P_mname, pims_personnel.P_lname FROM pims_personnel WHERE pims_personnel.emp_No='$emp_escape';";
						$get_emp = $this->mysqli->query($get_emp_query);
						$emp = $get_emp->fetch_assoc();
					}
					if($_SESSION['user_data']['acct']['emp_no']==NULL AND !empty($_SESSION['user_data']['acct']['lrn'])) {
						$lrn_escape = $this->mysqli->real_escape_string($_SESSION['user_data']['acct']['lrn']);
						$get_lrn_query="SELECT sis_student.lrn, sis_student.stu_fname, sis_student.stu_mname, sis_student.stu_lname FROM sis_student WHERE sis_student.lrn='$lrn_escape'";
						$get_lrn = $this->mysqli->query($get_lrn_query);
						$lrn = $get_lrn->fetch_assoc();
					}
					$get_priv_query="SELECT * FROM `cms_privilege` WHERE `cms_account_id` = '$id';";
					$get_priv = $this->mysqli->query($get_priv_query);
					$priva = array();
					$cnt1 = 0;
					while($priv = $get_priv->fetch_assoc()) {
						switch($priv['cms_account_type']) {
							case 'superadmin':
								$_SESSION['user_data']['priv']['cms_acct_types'][$cnt1]='superadmin';
								$account_type = 'superadmin';
								break;
							case 'admin':
								$_SESSION['user_data']['priv']['cms_acct_types'][$cnt1]='admin';
								if($account_type == 'superadmin') {

								}
								else {
									$account_type = 'admin';
								}
								break;
							case 'user':
								$_SESSION['user_data']['priv']['cms_acct_types'][$cnt1]='user';
								if($account_type == 'superadmin' OR $account_type == 'admin') {

								}
								else {
									$account_type = 'user';
								}
								break;
						}
						$priva[$cnt1][0] = $priv['cms_account_type'];
						$priva[$cnt1][1] = $priv['cms_priv_id'];
						$priva[$cnt1][2] = $priv['cms_priv'];
						$priva[$cnt1][3] = $priv['frms_priv'];
						$priva[$cnt1][4] = $priv['ims_priv'];
						$priva[$cnt1][5] = $priv['ipcrms_priv'];
						$priva[$cnt1][6] = $priv['oes_priv'];
						$priva[$cnt1][7] = $priv['pms_priv'];
						$priva[$cnt1][8] = $priv['pims_priv'];
						$priva[$cnt1][9] = $priv['prs_priv'];
						$priva[$cnt1][10] = $priv['css_priv'];
						$priva[$cnt1][11] = $priv['scms_priv'];
						$priva[$cnt1][12] = $priv['sis_priv'];
						++$cnt1;
					}
					$_SESSION['priva'] = $priva;
					if(count($priva)==1) {
						$_SESSION['user_data']['priv']['cms_account_type'] = $priva[0][0];
						$_SESSION['user_data']['priv']['cms_priv_ID'] = $priva[0][1];
						$_SESSION['user_data']['priv']['cms_priv'] = $priva[0][2];
						$_SESSION['user_data']['priv']['frms_priv'] = $priva[0][3];
						$_SESSION['user_data']['priv']['ims_priv'] = $priva[0][4];
						$_SESSION['user_data']['priv']['ipcrms_priv'] = $priva[0][5];
						$_SESSION['user_data']['priv']['oes_priv'] = $priva[0][6];
						$_SESSION['user_data']['priv']['pms_priv'] = $priva[0][7];
						$_SESSION['user_data']['priv']['pims_priv'] = $priva[0][8];
						$_SESSION['user_data']['priv']['prs_priv'] = $priva[0][9];
						$_SESSION['user_data']['priv']['css_priv'] = $priva[0][10];
						$_SESSION['user_data']['priv']['scms_priv'] = $priva[0][11];
						$_SESSION['user_data']['priv']['sis_priv'] = $priva[0][12];
					}
					if(count($priva)==2) {
						$_SESSION['user_data']['priv']['cms_account_type'] = $priva[0][0];
						if($priva[0][1]=='1' OR $priva[1][1]=='1') {
							$_SESSION['user_data']['priv']['cms_priv_ID'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['cms_priv_ID'] = '0';
						}
						if($priva[0][2]=='1' OR $priva[1][2]=='1') {
							$_SESSION['user_data']['priv']['cms_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['cms_priv'] = '0';
						}
						if($priva[0][3]=='1' OR $priva[1][3]=='1') {
							$_SESSION['user_data']['priv']['frms_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['frms_priv'] = '0';
						}
						if($priva[0][4]=='1' OR $priva[1][4]=='1') {
							$_SESSION['user_data']['priv']['ims_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['ims_priv'] = '0';
						}
						if($priva[0][5]=='1' OR $priva[1][5]=='1') {
							$_SESSION['user_data']['priv']['ipcrms_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['ipcrms_priv'] = '0';
						}
						if($priva[0][6]=='1' OR $priva[1][6]=='1') {
							$_SESSION['user_data']['priv']['oes_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['oes_priv'] = '0';
						}
						if($priva[0][7]=='1' OR $priva[1][7]=='1') {
							$_SESSION['user_data']['priv']['pms_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['pms_priv'] = '0';
						}
						if($priva[0][8]=='1' OR $priva[1][8]=='1') {
							$_SESSION['user_data']['priv']['pims_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['pims_priv'] = '0';
						}
						if($priva[0][9]=='1' OR $priva[1][9]=='1') {
							$_SESSION['user_data']['priv']['prs_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['prs_priv'] = '0';
						}
						if($priva[0][10]=='1' OR $priva[1][10]=='1') {
							$_SESSION['user_data']['priv']['css_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['css_priv'] = '0';
						}
						if($priva[0][11]=='1' OR $priva[1][11]=='1') {
							$_SESSION['user_data']['priv']['scms_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['scms_priv'] = '0';
						}
						if($priva[0][12]=='1' OR $priva[1][12]=='1') {
							$_SESSION['user_data']['priv']['sis_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['sis_priv'] = '0';
						}
					}
					if(count($priva)==3) {
						$_SESSION['user_data']['priv']['cms_account_type'] = $priva[0][0];
						if($priva[0][1]=='1' OR $priva[1][1]=='1' OR $priva[2][1]=='1') {
							$_SESSION['user_data']['priv']['cms_priv_ID'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['cms_priv_ID'] = '0';
						}
						if($priva[0][2]=='1' OR $priva[1][2]=='1' OR $priva[2][2]=='1') {
							$_SESSION['user_data']['priv']['cms_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['cms_priv'] = '0';
						}
						if($priva[0][3]=='1' OR $priva[1][3]=='1' OR $priva[2][3]=='1') {
							$_SESSION['user_data']['priv']['frms_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['frms_priv'] = '0';
						}
						if($priva[0][4]=='1' OR $priva[1][4]=='1' OR $priva[2][4]=='1') {
							$_SESSION['user_data']['priv']['ims_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['ims_priv'] = '0';
						}
						if($priva[0][5]=='1' OR $priva[1][5]=='1' OR $priva[2][5]=='1') {
							$_SESSION['user_data']['priv']['ipcrms_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['ipcrms_priv'] = '0';
						}
						if($priva[0][6]=='1' OR $priva[1][6]=='1' OR $priva[2][6]=='1') {
							$_SESSION['user_data']['priv']['oes_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['oes_priv'] = '0';
						}
						if($priva[0][7]=='1' OR $priva[1][7]=='1' OR $priva[2][7]=='1') {
							$_SESSION['user_data']['priv']['pms_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['pms_priv'] = '0';
						}
						if($priva[0][8]=='1' OR $priva[1][8]=='1' OR $priva[2][8]=='1') {
							$_SESSION['user_data']['priv']['pims_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['pims_priv'] = '0';
						}
						if($priva[0][9]=='1' OR $priva[1][9]=='1' OR $priva[2][9]=='1') {
							$_SESSION['user_data']['priv']['prs_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['prs_priv'] = '0';
						}
						if($priva[0][10]=='1' OR $priva[1][10]=='1' OR $priva[2][10]=='1') {
							$_SESSION['user_data']['priv']['css_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['css_priv'] = '0';
						}
						if($priva[0][11]=='1' OR $priva[1][11]=='1' OR $priva[2][11]=='1') {
							$_SESSION['user_data']['priv']['scms_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['scms_priv'] = '0';
						}
						if($priva[0][12]=='1' OR $priva[1][12]=='1' OR $priva[2][12]=='1') {
							$_SESSION['user_data']['priv']['sis_priv'] = '1';
						}
						else {
							$_SESSION['user_data']['priv']['sis_priv'] = '0';
						}
					}
					switch($account_type) {
						case 'superadmin':
							$_SESSION['msg']='Welcome';
							header('Location: ../admin/index.php');
							break;
						case 'admin':
							$_SESSION['msg']='Welcome';
							header('Location: ../admin/index.php');
							break;
						case 'user':
							$var_lrn=$_SESSION['user_data']['acct']['lrn'];
							$var_emp=$_SESSION['user_data']['acct']['emp_no'];
							if((empty($var_lrn) OR $var_lrn!='') AND ($var_emp==NULL OR $var_emp=='')) {
								header('Location: ../admin/index.php');
							}
							if((empty($var_emp) OR $var_emp!='') AND ($var_lrn==NULL OR $var_lrn=='')) {
								header('Location: ../admin/index.php');
							}
							break;
						default:
							header('Location: index.php');
							break;
					}
				}
				else {
					session_destroy();
					header('Location: ../index.php');
				}
			}
			else {
					header('Location: ../index.php');
			}
		}
		public function isLogIn() {
			if(isset($_SESSION['userdata'])) {
				return true;
			}
			else {
				return false;
			}
		}
		public function attemptLogOut() {
			if(isset($_SESSION['user_data'])) {
				$account_type = $_SESSION['user_data']['priv']['cms_account_type'];
				switch($account_type) {
					case 'superadmin':  break;
					case 'admin':  break;
					case 'personnel':  break;
					case 'user':  break;
					case 'student': header(); break;
					default: header('Location: index.php'); break;
				}
				if($_SESSION['user_data']['priv']['cms_priv']==1) {
					session_unset($_SESSION['user_data']);
					header('Location: index.php');
				}
				else {
					header('Location: index.php');
				}
			}
			else {
				header('Location: index.php');
			}
		}
		public function redirectUser($user_type) {
			if(isset($_SESSION['user_data'])) {
				$account_type = $_SESSION['user_data']['priv']['cms_account_type'];
				switch($account_type) {
					case 'superadmin':
					case 'admin':
					case 'personnel':
					case 'user':
					case 'student': header('Location: admin_idx.php'); break;
					default: header('Location: index.php'); break;
				}
			}
			else {
				header('Location: index.php');
			}
		}
		public function setLrnEmpFML() {
			if($_SESSION['user_data']['priv']['cms_priv']==1){
				if($_SESSION['user_data']['acct']['lrn']==NULL AND !empty($_SESSION['user_data']['acct']['emp_no'])) {
					$emp_escape= $this->mysqli->real_escape_string($_SESSION['user_data']['acct']['emp_no']);
					$get_emp_query="SELECT pims_personnel.emp_No, pims_personnel.P_fname, pims_personnel.P_mname, pims_personnel.P_lname FROM pims_personnel WHERE pims_personnel.emp_No='$emp_escape';";
					$get_emp = $this->mysqli->query($get_emp_query);
					$emp = $get_emp->fetch_assoc();
				}
				if($_SESSION['user_data']['acct']['emp_no']==NULL AND !empty($_SESSION['user_data']['acct']['lrn'])) {
					$lrn_escape= $this->mysqli->real_escape_string($_SESSION['user_data']['acct']['lrn']);
					$get_lrn_query="SELECT sis_student.lrn, sis_student.stu_fname, sis_student.stu_mname, sis_student.stu_lname FROM sis_student WHERE sis_student.lrn='$lrn_escape'";
					$get_lrn = $this->mysqli->query($get_lrn_query);
					$lrn = $get_lrn->fetch_assoc();
				}
			}
			else {
				header('Location: index.php');
			}
		} 
		public function toHomepage($link) {
			if(is_string($link)) {
				header("Location: ".$link."");
			}
			else {
				settype($link, "string");
				header("Location: ".$link."");
			}
		}
	}
	
	//$cms = new System();
	//echo $cms->connect($data = ["host"=>"localhost", "username"=>"root", "password"=>"", "database"=>"class_db9"]);
	//echo $cms->displayHUPD();
	//echo "<pre>"; print_r($_SERVER); echo "</pre>";
	//print_r($cms->getPHPVersion());
	//printf("Client library version: %s\n", mysqli_get_client_info());
	//echo "<pre>"; print_r(mysqli_get_client_info()); echo "</pre>";
?>