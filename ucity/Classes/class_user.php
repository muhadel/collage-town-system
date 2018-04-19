<?php

//include_once '../Database/database.php';
require_once '../Database/database.php';
class Class_user {
    private $id;
    private $username;
    private $password;
    private $encpassword;
    public  $name;
    public  $phone;
    public $email;
    public $user_type_id;


    public function get_id(){
        return $this->id;
    }
    public function set_id($id){
        $this->id=$id;
    }
      public function get_username(){
        return $this->username;
    }
    public function set_username($username){
        $this->username=$username;
    }
    public function set_password($password){
        $this->password=$password;
    }
       public function get_password(){
        return $this->password;
    }
    
    // encpassword
    public function set_encpassword($encpassword){
        $this->encpassword=$encpassword;
    }
       public function get_encpassword(){
        return $this->encpassword;
    }
    
    public function get_name(){
        return $this->name;
    }
    public function set_name($name){
        $this->name=$name;
    }
        public function get_email(){
        return $this->email;
    }
    public function set_email($email){
        $this->email=$name;
    }
        public function get_phone(){
        return $this->phone;
    }
    public function set_phone($phone){
        $this->phone=$phone;
    }
    public function set_user_type($type){
        $this->id=$type;
    }
       public function get_user_type(){
        return $this->user_type_id;
    }
    
    public function __construct($user_id='') {
        if($user_id !=""){
                    $Db_object=new database();
                    database::getInstance();
                    
                    $select_user_SQL="SELECT * FROM `users`  where id=$user_id";
                    $data=$Db_object->get_row($select_user_SQL);
                    $this->id=$data['id'];
                    $this->username=$data['username'];
                    $this->password=$data['password'];
                    $this->encpassword=$data['enc_password'];
                    $this->name=$data['name'];
                    $this->email=$data['email'];
                    $this->phone=$data['phone'];
                    $this->user_type_id=$data['user_type_id'];
        }
         
    }
    public function  login(){
        
        $db=new database;
        database::getInstance();
        
        $this->username=$db->clean($this->username);
        $this->password=$db->clean($this->password);
        // echo $this->username;
        $select_user_SQL="SELECT * FROM `users`  where username='$this->username' and enc_password='$this->encpassword'";
        
        $select_user_Result=$db->database_query($select_user_SQL);
        
        if($db->database_num_rows($select_user_Result)==1){
                 $user_data=$db->get_row($select_user_SQL);
                 $this->id=$user_data['id'];
                 
                  return $select_user_Result;
                
                       }
          else{
              
           return FALSE;
           
             }

    }
    
    
    public function new_student_request($name,$national_id,$city,$address,$sex,$religion,$birth_date,$phone,$parent_phone,$email,$highschool_grade,$path)
    {
        $db_object=new database;
        database::getInstance();
        //$db_object = database::getInstance();
        
        
        $check = "SELECT * FROM `student_request` WHERE national_id='$national_id' OR email='$email'";
        $select_user_Result=$db_object->database_query($check);
        if($db_object->database_num_rows($select_user_Result)==0){  //No building with the same name
                 
         $table='student_request';
         
         $data = array("name"=>"$name","national_id"=>"$national_id","city"=>"$city","address"=>"$address"
                 ,"sex"=>"$sex","religion"=>"$religion","birth_date"=>"$birth_date","phone"=>"$phone"
                 ,"parent_phone"=>"$parent_phone","email"=>"$email","highschool_grade"=>"$highschool_grade"
                 ,"file_uploaded_url"=>"$path");
         
         $db_object->insert($table, $data);
         return TRUE;
                
         }
          else{
              return FALSE;
         }
        
    }
    public function checkform()
    {
        $db_object=new database;
        database::getInstance();
        
        
        $select_user_SQL="SELECT formkey FROM `control_form` WHERE id=1";
         $SQl_result= $db_object->database_query($select_user_SQL);
         $all_data=$db_object->database_all_array($SQl_result);
         return $all_data;
    }
    
    

}
