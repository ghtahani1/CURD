<?php 
ini_set('display_errors', 'on') ; 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 mysqli_report(MYSQLI_REPORT_ERROR);

    $conn = mysqli_connect("localhost","root","root","CURD_vue"); 
    if ($conn->connect_error){
        die("connection faild".$conn->connect_error);
    }

    $result = array('error'=>false);
    $action = '';

    if(isset($_GET['action'])){
        $action = $_GET['action']; 
    }
    if($action == 'read'){
        $sql = $conn->query("SELECT * FROM users");
        $users = array(); 
        while($row = $sql->fetch_assoc()){
            array_push($users , $row); 
        }
        $result['users'] = $users ; 
    }

    if($action == 'create'){
        $name = $_POST["name"]; 
        $email = $_POST["email"]; 
        $phone = $_POST["phone"]; 

        $sql = $conn->query("INSERT INTO users (name , email , phone, created_at)  VALUES ('$name' , '$email' , '$phone' , now())");
        // $result = mysqli_query($conn,$sql);
  
        if($sql){
            $result['message'] = "تم اضافة المستخدم  "; 
        } else {
            $result['error'] = true ; 
            $result['message'] = 'noooo '; 
            // $result['message'] =  $conn->error;
            
        }

    }

    if($action == 'update'){
        $id = $_POST["id"];
        $name = $_POST["name"]; 
        $email = $_POST["email"]; 
        $phone = $_POST["phone"]; 

        $sql = $conn->query("UPDATE users SET name='$name',email='$email',phone='$phone' WHERE id='$id' ");

        if($sql){
            $result['message'] = "تم تحديث بيانات المستخدم  "; 
        } else {
            $result['error'] = true ; 
            $result['message'] = 'nooo bbbb' ;
        }

    }

    if($action == 'delete'){
        $id = $_POST['id'];
 

        $sql = $conn->query("DELETE FROM users  WHERE id='$id' ");
  
        if($sql){
            $result['message'] = "تم حذف بيانات المستخدم "; 
        } else {
            $result['error'] = true ; 
            $result['message'] = "<p>خطأ : لايمكن حذف بيانات المستخدم </p>" ; 
        }

    }


    $conn->close(); 

    echo json_encode($result); 

?>