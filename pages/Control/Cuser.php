<?php 

    class userinfo{
        //attributs
        private $l_name ="";
        private $f_name = "";
        private $user_name = "";
        private $email = "";
        private $password = "";
        private $filier = "";
        private $phone = "";
        private $gender = "";
        private $level ="";
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
            //level
            public function set_level($level){
                if(strlen($level)<=20){
                    $this->level = $this->test_input($level);
                }else{
                    $this->level="";
                }
            }
            public function get_level(){
                return $this->level;
            }
            //verifier valeur les attributs 
            public function verifierChamps(){
                $test = false;
                if((!empty($this->get_l_name())) && !empty($this->get_f_name()) && !empty($this->get_user_name()) && !empty($this->get_email()) && !empty($this->get_password()) && !empty($this->get_filier()) && !empty($this->get_phone()) && !empty($this->get_gender()) && !empty($this->get_level())){
                    $test = true;
                }
                return $test;
            }
            //load all users
            public function AllUsers($con){
                $cmd = "SELECT * from user_";
                $rst = mysqli_query($con,$cmd);
                return $rst;
            }
            //Add User Utilisateur To DataBase
            public function AddUser($con,$pic,$status){

                $cmd = $rst = "";
                if(!empty($this->l_name) && !empty($this->f_name) && !empty($this->user_name) && !empty($this->email) && !empty($this->password) && !empty($this->filier) && !empty($this->phone) && !empty($this->gender) && !empty($this->level) && $pic != ""){
                    $command = "SELECT user_name,Email from user_ WHERE user_name = '$this->user_name' or Email = '$this->email'";
                        $result  = mysqli_query($con,$command);
                        $n = mysqli_num_rows($result);
                        if ($n > 0) {
                                return false;
                        }else{
                            
                            $cmd = "INSERT INTO `user_`(`id`, `last_name`, `first_name`, `user_name`, `email`, `password`, `sipnneret`, `phone`, `gender`, `level`, `picture` , `status_`) VALUES (null,'$this->l_name','$this->f_name','$this->user_name','$this->email','$this->password','$this->filier','$this->phone','$this->gender','$this->level','$pic','$status')";
                            
                            if(mysqli_query($con,$cmd)){
                                $rst = true;
                            }else{
                                $rst = "bad";
                            }
                        }
                    
                }
                return $rst;
            }
            //login User
            public function LoginUser($con,$user,$pw){
                $cmd = "SELECT user_name,Email,password from user_ where ((user_name = '$user' or Email = '$user') and password = '$pw') and  status_ = 0  ";
                $rst = mysqli_query($con,$cmd);
                return $rst;
            }
            //Delete User In DataBase
            public function DeleteUser($con,$id){
                $cmd = "DELETE FROM `user` WHERE id = '$id' ";
                return mysqli_query($con,$cmd);
            }
            //Method pour retourne les information user selection par UserName or Email
            public function SelectUser($con,$name){
                $command = "SELECT * from user_ WHERE user_name = '$name' or Email = '$name'";
                $result  = mysqli_query($con,$command);
                $row = mysqli_fetch_row($result);
                return $row;
            }
            //Method pour retourne les information user selection par id
            public function SelectUserId($con,$id){
                $command = "SELECT * from user_ WHERE id = '$id' ";
                $result  = mysqli_query($con,$command);
                $row = mysqli_fetch_row($result);
                return $row;
            }
            //Method knowledge friends 
            public function knowledgeFriends($con,$id)
            {
                $command = "SELECT * from user_ WHERE id <> $id ";
                $result  = mysqli_query($con,$command);
                return $result;
            }

            //Method pour retourne id user
            public function SelectIdUser($con,$name){
                $command = "SELECT * from user_ WHERE user_name = '$name' or Email = '$name'";
                $result  = mysqli_query($con,$command);
                $row = mysqli_fetch_row($result);
                return $row[0];
            }
            //Select Friends
            public function SelectFriendsAsso($con,$id){
                $command = "SELECT * from friends where id_response = $id and status_ = 1";
                $result = mysqli_query($con,$command);
                $id_friends = array();
                $tst=0;
                while($row = mysqli_fetch_row($result)){
                    
                        $id_friends[] = $row[1];
                                
                }
                $command = "SELECT * from friends where id_request = $id and status_ = 1";
                $result = mysqli_query($con,$command);
                while($row = mysqli_fetch_row($result)){
                    
                        $id_friends[] = $row[2];
                                
                }
                return $id_friends;
            }
            //Select Response Invitation
            public function ResponseInvit($con,$id){
                $command = "SELECT * from friends where id_response = $id and status_ = 0";
                $result = mysqli_query($con,$command);
                $id_friends = array();
                $tst=0;
                while($row = mysqli_fetch_row($result)){
                    
                        $id_friends[] = $row[1];
                                
                }
                return $id_friends;
            }
            //Select Request Invitation
            public function RequestInvit($con,$id){
                $command = "SELECT * from friends where id_request = $id and status_ = 0";
                $result = mysqli_query($con,$command);
                $id_friends = array();
                $tst=0;
                while($row = mysqli_fetch_row($result)){
                    
                        $id_friends[] = $row[2];
                                
                }
                return $id_friends;
            }
            //method get all friends staus_ = 0 && staus_ = 1 && staus_ = 2
            public function TableFriends($con,$id){
                $cmd = "SELECT * from friends where id_response = $id ";
                $id_friends = array();
                $rst = mysqli_query($con,$cmd);
                while($row = mysqli_fetch_row($rst)) $id_friends[] = $row[1];
                $cmd = "SELECT * from friends where id_request = $id ";
                $rst = mysqli_query($con,$cmd);
                while($row = mysqli_fetch_row($rst)) $id_friends[] = $row[2];
                return $id_friends;
            }
            //Add Friends 
            public function AddFriends($con,$id_user,$id_friends){
                $command = "INSERT INTO friends values(null,$id_user,$id_friends,0)";
                return mysqli_query($con,$command);
            }
            //Accepte Friends
            public function AccepteFriends($con,$id_user,$id_friends){
                $command = "UPDATE friends set status_ = 1 where (id_response = $id_user or id_request = $id_user) and ( id_response = $id_friends or id_request = $id_friends ) and  status_ = 0 ";
                return $rst =  mysqli_query($con,$command);
            }
            //Block Friends
            public function BlockFriends($con,$id_user,$id_friends){
                $command = "UPDATE friends set status_ = 2 where (id_response = $id_user or id_request = $id_user) and ( id_response = $id_friends or id_request = $id_friends ) and status_ != 2 ";
                return mysqli_query($con,$command);
            }
            //
            public function InvitFromers($con,$id_user,$id_formers){
                $status = 0;
                $command = "INSERT INTO `formersstudiant`(`id`, `id_formers`, `id_studiant`, `status_`) VALUES (null,'$id_formers','$id_user','$status')";
                return mysqli_query($con,$command);
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