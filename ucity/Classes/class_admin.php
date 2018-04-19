<?php
include_once '../Database/database.php';;
Class class_admin
{
    
    public function openform() {
        
        $db_object=new database();
         database::getInstance();
         
        $table="control_form";
        $data=array("id"=>"1","formkey"=>"1");
        $db_object->update($table, $data);
        
    }
    public function closeform() {
        
        $db_object=new database();
         database::getInstance();
         
        $table="control_form";
        $data=array("id"=>"1","formkey"=>"0");
        $db_object->update($table, $data);
        
    }


    public function check_admin($type)
    {
        if($type ==1)
            return TRUE;
        else {
            return FALSE;
        }
    }
    
    
    public function show_building()
    {
         $db_object=new database();
         database::getInstance();
         
         $select_user_SQL="SELECT * FROM `building`";
         $SQl_result= $db_object->database_query($select_user_SQL);
         $all_data=$db_object->database_all_array($SQl_result);
         return  $all_data;

    }
     
    public function add_new_building($num , $capacity)
    {
        $db_object=new database();
         database::getInstance();
        
        $check = "SELECT * FROM `building` WHERE building_num=$num";
        $select_user_Result=$db_object->database_query($check);
        if($db_object->database_num_rows($select_user_Result)!=1){  //No building with the same name
                 
            $table='building';
         $data = array("building_num"=>"$num","available_place"=>"$capacity");
         $db_object->insert($table, $data);
         return TRUE;
                
                  }
          else{
              
           return FALSE;
         }
  
    }
    public function set_announcement($ann,$date)          
    {
        $db_object=new database();
         database::getInstance();
         
         $table = "announcement";
         $data = array("content"=>"$ann","date"=>"$date","admin_id"=>"1");
         
         $db_object->insert($table, $data);
       
    }
    public function show_supervisors()
    {
        $db_object=new database();
         database::getInstance();
         
         
         $select_supervisor_SQL="SELECT id,name,email,phone,username,password FROM `users` WHERE user_type_id=3";
         $SQl_result= $db_object->database_query($select_supervisor_SQL);
         $all_data=$db_object->database_all_array($SQl_result);
         return  $all_data;
        
    }
    
    public function add_supervisors($name,$email,$phone,$username,$password,$enc_password)
    {
        $db_object=new database();
         $db_object= database::getInstance();
      
         
         $table = "users";
         $data = array("username"=>"$username","password"=>"$password","enc_password"=>"$enc_password",
             "name"=>"$name","phone"=>"$phone","email"=>"$email","user_type_id"=>"3");
         $db_object->insert($table, $data);
         
    }
    
    public function get_supervisor_by_id($id) {
        
        $db_object=new database();
         $db_object= database::getInstance();
       
        $select_user_SQL="SELECT * FROM `users`  WHERE id=$id";
         $SQl_result= $db_object->database_query($select_user_SQL);
         $all_data=$db_object->database_all_array($SQl_result);
         return  $all_data;
        
        
    }
    
    public function collage_num($collage_name)
    {
         $db_object=new database();
         database::getInstance();
         
         $select_user_SQL="SELECT COUNT(*) FROM `student` WHERE student.collage='$collage_name'";
         $SQl_result= $db_object->database_query($select_user_SQL);
         $all_data=$db_object->database_all_array($SQl_result);
         return  $all_data;
    }
    
    public function show_students()
    {
        $db_object = database::getInstance();
        
        $select_user_SQL="SELECT room_num,users_id FROM `student` INNER JOIN room ON student.room_id = room.id";
        $SQl_result= $db_object->database_query($select_user_SQL);
        $all_data=$db_object->database_all_array($SQl_result);
        //return  $all_data;
        foreach ($all_data as $rows)
        {
            $select_user_SQL="SELECT users.id,name,room_num FROM `users` INNER JOIN student ON users.id = student.users_id INNER JOIN room ON room.id = student.room_id";
            //$select_user_SQL="SELECT name FROM `users` INNER JOIN student ON ".$rows['users_id']." = student.users_id";
            $SQl_result= $db_object->database_query($select_user_SQL);
            
            $all_data=$db_object->database_all_array($SQl_result);
            return  $all_data;
            
        }
    }
    public function check_new_students() {
        
        
        $db_object=new database();
         database::getInstance();
        
        $select_user_SQL="SELECT * FROM `student_request` ORDER by highschool_grade DESC LIMIT 3";
         $SQl_result= $db_object->database_query($select_user_SQL);
         $all_data=$db_object->database_all_array($SQl_result);
         
         $table="users";
         
         foreach ($all_data as $rows)
         {
             $data=array("username"=>"s1","password"=>"123","enc_password"=>"40bd001563085fc35165329ea1ff5c5ecbdbbeef"
             ,"name"=>$rows['name'],"phone"=>$rows['phone'],"email"=>$rows['email'],"user_type_id"=>"2");
             
             $db_object->insert($table, $data);
         }
        
        
    }
    
    public function get_emails_user_password()
    {
         $db_object=new database();
         database::getInstance();
         
         $select_user_SQL="SELECT email,username,password FROM `users` where id=1 or id = 2";
         $SQl_result= $db_object->database_query($select_user_SQL);
         $all_data=$db_object->database_all_array($SQl_result);
         return  $all_data;
         
    }
    
    
    
}
