<?php
    include 'Room.php';
    class ReservationServices{
        private $conn;
        function __construct(mysqli $conn)
        {
            $this->conn = $conn;
        }
        function ReserveRoom(Room $room){
           if($this->CheckAvailability($room->timeIn,$room->date,$room->roomID)){    
                $query = "INSERT INTO `tbl_reservation`( `RoomID`,`FacultyID`,`Date`, `TimeIn`, `TimeOut`, `SubjectID`, `CourseID`,`YearID`) VALUES ('".$room->roomID."','".$room->prof."','".$room->date."','".$room->timeIn."','".$room->timeOut."','".$room->subjectID."','".$room->courseID."','".$room->year."')";
                $this->conn->query($query);
                if(empty($this->conn->error)){
                    echo "SUCCESSFUL";
                }else{
                    echo $this->conn->error;
                }
            }else{
                echo "TIME IS NOT AVAILABLE";
            }
        }
        function GetReserveViaDescription($description){
            $query = "SELECT `RoomID` FROM `tbl_room` WHERE `Description`= '" . $description . "'";
            $result = $this->conn->query($query);
            if(isset($result)){
                return $result->fetch_row();
            }
            
        }
        
        function ConvertID($ID,$tablename){
            if($tablename=="faculty"){
                $query = "SELECT `FirstName`,`LastName` FROM `tbl_".$tablename."` WHERE `".ucfirst($tablename)."ID` = '" . $ID . "'";
                $result = $this->conn->query($query);
                if(isset($result)){
                    return $result->fetch_row();
                }
            }
            $query = "SELECT `Description` FROM `tbl_".$tablename."` WHERE `".ucfirst($tablename)."ID` = '" . $ID . "'";
            $result = $this->conn->query($query);
            if(isset($result)){
                return $result->fetch_row();
            }
            
        }
        
        function GetReservationOfCurrentRoom($roomID){
            date_default_timezone_set('Asia/Manila');
            $rooms = [];
            $query = "SELECT * FROM `tbl_reservation` WHERE `Date` = '".date("Y-m-d")."' AND `TimeIn` <= '" . date("H:i:s a") ."' AND `TimeOut` >= '" . date("H:i:s a") . "' AND `RoomID` = '" .$roomID. "'";
            $result = $this->conn->query($query);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $profname = $this->ConvertID($row['FacultyID'],"faculty");
                    $course = $this->ConvertID($row['CourseID'],"course");
                    $subject = $this->ConvertID($row['SubjectID'],"subject");
                    $year = $this->ConvertID($row['YearID'],"year");
                    $rooms[$row['ReservationID']] = new Room( $row['RoomID'], $row['Date'],date("h:i:s a", strtotime($row['TimeIn'])),date("h:i:s a", strtotime($row['TimeOut'])),$subject[0],$course[0],$year[0],$profname[0]." ".$profname[1]);
                    
                }
                echo json_encode($rooms);
            }else{
                echo "VACANT";
            }
            
        }
        function GetReservationOfCurrentMonth($month,$year){
            $rooms = [];
            $query = "SELECT * FROM `tbl_reservation` WHERE MONTH(Date) = '".$month."' AND YEAR(Date) = '".$year."'";
            $result = $this->conn->query($query);
            while($row = $result->fetch_assoc()){
                $rooms[$row['ReservationID']] = new Room($row['RoomID'],$row['Date'],date("h:i:s a", strtotime($row['TimeIn'])),date("h:i:s a", strtotime($row['TimeOut'])),$row['SubjectID'],$row['CourseID'],$row['YearID'],$row['FacultyID']); 
            }
            echo json_encode($rooms);
        
        }
        function CheckAvailability($timeIn,$date,$roomID){
            $query = "SELECT * FROM `tbl_reservation` WHERE `Date` = '".$date."' AND `RoomID` = '".$roomID."' AND `TimeIn` <= '".$timeIn."' AND `TimeOut` >= '".$timeIn."'";
            $res = $this->conn->query($query);
            $row = $res->fetch_row();
            if(empty($row)){
                return true;
            }else{
                return false;
            }
        }
        function PopulateRoom(){
            $query = "SELECT * FROM `tbl_room`";
            $res = $this->conn->query($query);
            $course = [];
            while($row = $res->fetch_assoc()){
                $course[$row['RoomID']] = $row['Description'];
            }
            echo json_encode($course);
        }
    }


?>