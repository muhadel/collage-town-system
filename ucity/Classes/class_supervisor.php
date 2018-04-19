<?php
error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE & ~E_DEPRECATED);
include_once '../Database/database.php';;

class class_supervisor
{
    public function check_supervisor($type)
    {
        if($type ==3)
            return TRUE;
        else {
            return FALSE;
        }
    }
    public function supervisor_building($supervisor_id)
    {
         //$db_object=new database();
         $db_object = database::getInstance();
         
         
         $select_user_SQL="SELECT building_num FROM supervisor_building where users_id =$supervisor_id LIMIT 1";
         $SQl_result= $db_object->database_query($select_user_SQL);
         $all_data=$db_object->database_all_array($SQl_result);
         return  $all_data;

    }
    
    public function show_students_by_room($room_num)
    {
        $db_object = database::getInstance();
        
        $select_user_SQL="SELECT room_num,users_id FROM `student` INNER JOIN room ON student.room_id = room.id WHERE room.room_num=$room_num";
        $SQl_result= $db_object->database_query($select_user_SQL);
        $all_data=$db_object->database_all_array($SQl_result);
        //return  $all_data;
        foreach ($all_data as $rows)
        {
            $select_user_SQL="SELECT users.id,name,room_num FROM `users` INNER JOIN student ON users.id = student.users_id INNER JOIN room ON room.id = student.room_id WHERE room.room_num=$room_num";
            //$select_user_SQL="SELECT name FROM `users` INNER JOIN student ON ".$rows['users_id']." = student.users_id";
            $SQl_result= $db_object->database_query($select_user_SQL);
            
            $all_data=$db_object->database_all_array($SQl_result);
            return  $all_data;
            
        }
        
    }
    // lsa m5ls4;
    public function set_penalty_student($student_name, $penalty, $date, $supervisor_id)          
    {
        $db_object=new database();
         database::getInstance();
         
         
         $query = "SELECT id FROM `users` WHERE name=$student_name";
             $data = $db_object->get_row($query);
             $student_id = $data['id'];
         
         
         $table = "penalties";
         $data = array("content"=>"$penalty","date"=>"$date","supervisor_id"=>"$supervisor_id");
         
         $db_object->insert($table, $data);
         
         if($db_object->insert($table, $data))
         {
             $last_id = $db_object->last_id();
             $table="student_penalties";
             $data = array("penalties_id"=>"$last_id","student_id"=>"$student_id");
         }  
    }
    
    
    public function set_penalty_room($room_num,$penalty,$date,$supervisor_id)          
    {
        $db_object=new database();
         database::getInstance();
         
         $table = "penalties";
         $data = array("content"=>"$penalty","date"=>"$date","supervisor_id"=>"$supervisor_id");
         
         $db_object->insert($table, $data);
         
         if($db_object->insert($table, $data))
         {
             $last_id = $db_object->last_id();
             
         }  
            /*$query = "SELECT id FROM `room` WHERE room.room_num=$room_num";
             $data = $db_object->get_row($query);
             $room_id = $data['id'];
             $table="student_penalties";
             $data = array("penalties_id"=>"$last_id","room_id"=>"$room_id");
             $db_object->insert($table, $data);//  feh mo4kell hna  fel room penalty 3omaman*/
    }
    
}