<?php
	/**
	 * 
	 */
	
	class formers
	{
			 //attributs
        private $l_name ="";
        private $f_name = "";
        private $cin ="";
        private $user_name = "";
        private $email = "";
        private $password = "";
        private $filier = "";
        private $phone = "";
        private $gender = "";
        private $centreFormation = "";
        private $status_;
        private $CodeValidation;
        //construteur par defaut
        public function __construct(){}
        //property
            //last name
            public function set_l_name($lname){
                if(strlen($lname)<=20){
                    $this->l_name = $this->test_input($lname);
                }else{
                    $this->l_name="";
                }
            }
            public function get_l_name(){
                return $this->l_name;
            }
            //first name
            public function set_f_name($fname){
                if(strlen($fname)<=20){
                    $this->f_name = $this->test_input($fname);
                }else{
                    $this->f_name="";
                }
            }
            public function get_f_name(){
                return $this->f_name;
            }
            //CIN
            public function set_cin($cin){
                if(strlen($cin)<=20){
                    $this->cin = $this->test_input($cin);
                }else{
                    $this->cin="";
                }
            }
            public function get_cin(){
                return $this->cin;
            }
            //user name
            public function set_user_name($uname){
                if(strlen($uname)<=20){
                    $this->user_name = $this->test_input($uname);
                }else{
                    $this->user_name="";
                }
            }
            public function get_user_name(){
                return $this->user_name;
            }
            //email
            public function set_email($email){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $this->email = $this->test_input($email);
                }else{
                    $this->email="";
                }
            }
            public function get_email(){
                return $this->email;
            }
            //password
            public function set_password($password1,$password2){
                if($password1 == $password2){
                    $this->password = $this->test_input($password2);
                    $this->password = md5($this->password);
                }else{
                    $this->password="";
                }
            }
            public function get_password(){
                return $this->password;
            }
            //filier
            public function set_filier($filier){
                if(strlen($filier)<=20){
                    $this->filier = $this->test_input($filier);
                }else{
                    $this->filier="";
                }
            }
            public function get_filier(){
                return $this->filier;
            }
            //phone
            public function set_phone($phone){
                if(is_numeric($phone)){
                    $this->phone = $this->test_input($phone);
                }else{
                    $this->phone="";
                }
            }
            public function get_phone(){
                return $this->phone;
            }
            //gender
            public function set_gender($gender){
                if(strlen($gender)<=20){
                    $this->gender = $this->test_input($gender);
                }else{
                    $this->gender="";
                }
            }
            public function get_gender(){
                return $this->gender;
            }
            //centre Formation
            public function set_centreFormation($centreF){
                if(strlen($centreF)<=90){
                    $this->centreFormation = $this->test_input($centreF);
                }else{
                    $this->centreFormation="";
                }
            }
            public function get_centreFormation(){
                return $this->centreFormation;
            }
            //load all Formateur
            public function LoadAllFormers($con){
                $cmd = "SELECT * from Formateur where status_ = 1 ";
                return mysqli_query($con,$cmd);
            }
            //verifier valeur les attributs 
            public function verifierChamps(){
                $test = false;
                if((!empty($this->get_l_name())) && !empty($this->get_f_name()) && !empty($this->get_cin()) && !empty($this->get_user_name()) && !empty($this->get_email()) && !empty($this->get_password()) && !empty($this->get_filier()) && !empty($this->get_phone()) && !empty($this->get_gender()) && !empty($this->get_centreFormation())){
                    $test = true;
                }
                return $test;
            }
            //return id formers
            public function SelectIdFormers($con,$formers){
                $cmd = "SELECT * from formateur where user_name = '$formers' or email = '$formers' ";
                $rst = mysqli_query($con,$cmd);
                $row = mysqli_fetch_row($rst);
                return $row[0];
            }
            // select info formers 
            public function SelectFormers($con,$formers){
                $cmd = "SELECT * from formateur where user_name = '$formers' or email = '$formers' ";
                $rst = mysqli_query($con,$cmd);
                return $row = mysqli_fetch_row($rst);
            }
            //Add formers To DataBase
            public function AddFormers($con,$pic){
                $this->status_ = 0;
                $cmd = $rst = "";
                if($this->verifierChamps()){
                    $command = "SELECT user_name,Email from formateur WHERE user_name = '$this->user_name' or Email = '$this->email'";
                        $result  = mysqli_query($con,$command);
                        $n = mysqli_num_rows($result);
                        if ($n > 0) {
                                return false;
                        }else{
                            $cmd = "INSERT INTO `formateur`( `l_name`, `f_name`, `cin`, `user_name`, `email`, `password`, `sipnneret`, `phone`, `gender`, `centreF`, `status_`, `picture`) VALUES ('$this->l_name','$this->f_name','$this->cin','$this->user_name','$this->email','$this->password','$this->filier','$this->phone','$this->gender','$this->centreFormation','$this->status_','$pic')";
                            if(mysqli_query($con,$cmd)){
                                $rst = "insert";
                            }else{
                                $rst = "bad";
                            }
                        }
                    
                }
                return $rst;
            }

            //
            public function test_input($data) {
                  $data = trim($data);
                  $data = stripslashes($data);
                  $data = htmlspecialchars($data);
                  return $data;
            }
		
	}

?>