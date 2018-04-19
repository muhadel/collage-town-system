<?php
include_once '../Database/database.php';
include_once '../Classes/class_user.php';

class class_student extends Class_user
{
    
     public function check_student($type)
    {
        if($type ==2)
            return TRUE;
        else {
            return FALSE;
        }
    }
    
    
    public function old_student_request($grade,$year,$student_id)
    {
        $db_object=new database();
         database::getInstance();
         
         $table= "old_student_grade";
         $data = array ("collage_grade"=>"$grade","year"=>"$year","student_id"=>"$student_id"); 
         
         $select_user_SQL="SELECT * FROM `old_student_grade`  where year='$year' and student_id='$student_id'";
         $select_user_Result=$db_object->database_query($select_user_SQL);
        
        if($db_object->database_num_rows($select_user_Result)>=1){
                        
            
                    $db_object->update($table, $data);     
                
                       } else {
                           $db_object->insert($table, $data);     
                       }
         //$db_object->insert($table, $data);     
         
    }
    
    public function payment($card_name , $card_num , $card_password,$month,$student_id)
    {
        $db_object=new database();
         database::getInstance();
         
         $table= "payment";
         $data = array ("name_card"=>"$card_name","card_num"=>"$card_num","security_code"=>"$card_password","month"=>"$month","student_id"=>"$student_id"); 
         
         $select_user_SQL="SELECT * FROM `payment`  where month='$month' and student_id='$student_id'";
         $select_user_Result=$db_object->database_query($select_user_SQL);
        
        if($db_object->database_num_rows($select_user_Result)>=1){
                        
            
                    $db_object->update($table, $data);     
                
                       } else {
                           $db_object->insert($table, $data);     
                       } 
    }
    public function show_announcements()
    {
         $db_object=new database();
         database::getInstance();
         
         $select_user_SQL="SELECT content,date FROM `announcement` ORDER BY date DESC";
         $SQl_result= $db_object->database_query($select_user_SQL);
         $all_data=$db_object->database_all_array($SQl_result);
         return  $all_data;

    }
    
    public function show_student_penalties($student_id)
    {
         $db_object=new database();
         database::getInstance();
         
         $select_user_SQL="SELECT content,date FROM `penalties` INNER JOIN `student_penalties` ON penalties.id = student_penalties.penalties_id WHERE student_penalties.student_id=$student_id";
         $SQl_result= $db_object->database_query($select_user_SQL);
         $all_data=$db_object->database_all_array($SQl_result);
         return  $all_data;

    }
    public function show_room_penalties($student_room)
    {
         $db_object=new database();
         database::getInstance();
         
         $select_user_SQL="SELECT content,date from `penalties` inner JOIN `room` ON room.penalties_id = penalties.id WHERE room.room_num=$student_room";
         $SQl_result= $db_object->database_query($select_user_SQL);
         $all_data=$db_object->database_all_array($SQl_result);
         return  $all_data;

    }
    public function show_attendance($student_id)
    {
         $db_object=new database();
         database::getInstance();
         
         $select_user_SQL="SELECT attendance_date from student_attendance INNER JOIN student ON student_attendance.student_id= student.users_id WHERE attendance=0 AND student.users_id=$student_id";
         $SQl_result= $db_object->database_query($select_user_SQL);
         $all_data=$db_object->database_all_array($SQl_result);
         return  $all_data;

    }
    
}