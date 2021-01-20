<?php
    include 'Account.php';
    include 'AccountServices.php';
    include 'ReservationServices.php';

    $conn = new mysqli("localhost","root","","db_roomreservation");
    if($conn->error){
        echo $conn->error;
    }
    $accServices = new AccountServices($conn);
    $reserveServices = new ReservationServices($conn);
    
    if(isset($_POST['btn_name'])){
        $btn_name = $_POST['btn_name'];
        switch($btn_name){
            default:
            case "btn_register":
                if(isset($_POST['Year'])){
                    $accServices->AddAccount(new Account($_POST['Username'],$_POST['Firstname'],$_POST['Middlename'],$_POST['Lastname'],$_POST['Course'],$_POST['Year'],$_POST['Birthday'],$_POST['Password']),$_POST['AccountType']);    
                }else{
                    $accServices->AddAccount(new Account($_POST['Username'],$_POST['Firstname'],$_POST['Middlename'],$_POST['Lastname'],$_POST['Course'],"",$_POST['Birthday'],$_POST['Password']),$_POST['AccountType']);    
                }
                break;
            case "btn_login":
                $accServices->LoginAccount($_POST['Username'],$_POST['Password'],$_POST['AccountType']);
                break;
            case "btn_reserve":
                $date = $_POST['DateTime'];
                $time = date("H:i:s",strtotime($date));
                $new_date = date("Y-m-d",strtotime($date));
                $reserveServices->ReserveRoom(new Room($_POST['RoomNum'],$new_date,$time,$_POST['Timeout'],$_POST['SubjectCode'],$_POST['Course'],$_POST['Year'],$_POST['Professor']));
                break;
            
        }
    }
    if(isset($_GET['get_code'])){
        switch($_GET['get_code']){
            default:
            case 0:
                $accServices->PopulateCourse();
                break;
            case 1:
                $reserveServices->PopulateRoom();
                break;
            case 2:
                $accServices->PopulateYear();
                break;
            case 4:
                $accServices->PopulateProfessor();
                break;
            case 5:
                
                $reserveServices->GetReservationOfCurrentMonth($_GET['month'],$_GET['year']);
                break;
            case 6:
                $ID = $reserveServices->GetReserveViaDescription($_GET['Desc']);
                $reserveServices->GetReservationOfCurrentRoom($ID[0],$_GET['Date']);
                break;
            case 7:
                $accServices->PopulateSubject();
                break;
            case 8:
                $accServices->GetAccountName($_GET['ID'],$_GET['AccType']);
                break;
        }
        
    }

?>