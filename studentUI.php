<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="design/studentUI_style.css?v=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script/request.js"></script>
    <script src="script/student.js"></script>
    
</head>
<body>
    <header class="main-header"> 
        <img class="imglogo" src=image/PUPLogo.png>
        <div class="header"> 
            <h2> POLYTECHNIC UNIVERSITY OF THE PHILIPPINES </h2>     
            <p class="text1"> BIÑAN CAMPUS </p>
        </div>
    </header>

<img class="pup" src="image/pup.jpg">


 <!-- for table -->
<div class="container">
    <div class="tbl-container">
        <table id="tbl_room">
        <tr>
        <th colspan="5" class="thead" > 
        <?php 
        echo "<p id='date'>" . date("l")."," ." ". date("Y/m/d") ."</p>";               
        ?>    
        </th>
        </tr>
        <tr>
            <td>5th Floor</td>
            <td class="modalBtn">504</td>
            <td class="modalBtn">503</td>
            <td class="modalBtn">502</td>
            <td class="modalBtn">501</td>
        </tr>
        <tr>
            <td>4th Floor</td>
            <td class="modalBtn">404</td>
            <td class="modalBtn">403</td>
            <td class="modalBtn">402</td>
            <td class="modalBtn">401</td>
        </tr>
        <tr>
            <td>3rd Floor</td>
            <td class="modalBtn">304</td>
            <td class="modalBtn">303</td>
            <td class="modalBtn">302</td>
            <td class="modalBtn">301</td>
        </tr>
        <tr>
            <td>2nd Floor</td>
            <td class="modalBtn">204</td>
            <td class="modalBtn">203</td>
            <td class="modalBtn">202</td>
            <td class="modalBtn">201</td>
        </tr>
        <tr>
            <td>1st Floor</td>
            <td>Library</td>
            <td></td>
            <td>Office</td>
            <td>Clinic/Faculty</td>
        </tr>
        </table>
    </div>

    <div class="res-container">
        <div class="side-container">
            <div>
                <img src="image/reserve.svg" class="img-side">
                  <button class="btnSide" id="resModalBtn"> reserve</button>
            </div>
            <div>
                <img src="image/logout.svg" class="img-side">
             <a href="index.php"> <button class="btnSide"> logout</button> </a>
            </div>
            <div>
                <img src="image/about.svg" class="img-side">
                <button class="btnSide" id="aboutBtn"> about</button>
             </div>
        </div>
        
        
    </div>
</div>




<!-- FOR CHECKING ROOM AVAILABILITY -->
<div id="simpleModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
        <span class="closeBtn">&times;</span>
        <h2>ROOM DESCRIPTION</h2>
       </div>
       <div class="modal-body">
            <form>  
                   <div>
                       <h5>PROFESSOR NAME:</h5>
                       <input class = "read" name="professor" type="text" readonly>
                   </div>
                   <div>
                       <h5>DATE AND TIME:</h5>
                       <input class = "read" name="dateTime" type="text" readonly>
                   </div>
                   <div>
                       <h5>COURSE:</h5>
                       <input class = "read" name="course" type="text" readonly>
                   </div>
                   <div>
                       <h5>YEAR:</h5>
                       <input class = "read"  name="year" type="text" readonly>
                   </div>
                   
                   <div>
                       <h5>SUBJECT CODE:</h5>
                       <input class = "read"  name="subject" type="text" readonly>
                   </div>
            </form>
       </div>
       <div class="modal-footer">
           
       </div>
    </div>
   </div>

<!-- FOR ROOM RESERVATION -->
<div id="simpleModal1" class="modal">
    <div class="modal-content">
        <div class="modal-header">
        <span class="closeBtn1">&times;</span>
        <h2>ROOM RESERVATION</h2>
       </div>
       <div class="modal-body">
            <form id="res_room">  
                   <div>
                       <h5>ROOM NO:</h5>
                        <select name="RoomNum">

                        </select>
                   </div>
                   <div>
                       <h5>PROFESSOR NAME:</h5>
                       <select name="Professor">

                        </select>
                   </div>
                   <div>
                       <h5>DATE AND TIME:</h5>
                       <input id="timein" name ="DateTime" type="datetime-local">
                       <input id="timeout" name ="Timeout" type="time">

                   </div>
                   
                   <div>
                       <h5>COURSE:</h5>
                       <select name="Course">

                        </select>
                   </div>
                   <div>
                       <h5>YEAR:</h5>
                       <select name="Year">

                        </select>
                   </div>
                   <div>
                       <h5>SUBJECT CODE:</h5>
                       <select name="SubjectCode">

                        </select>
                   </div>
                   <label id="res_errormsg"></label>
                   <button type="submit" class="btnFooter">reserve</button>
                   <input type="reset" value="RESET" class="btnFooter">
            </form>
       </div>
       <div class="modal-footer">
            
            
       </div>
    </div>
   </div>

   <!-- MODAL FOR ABOUT -->
<div id="simpleModal2" class="modal">
    <div class="modal-content">
        <div class="modal-header">
        <span class="closeBtn2">&times;</span>
        <h2>ABOUT</h2>
       </div>
       <div class="modal-body">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias autem, magnam esse accusamus
             facere consequuntur amet reiciendis voluptas
            libero ab aliquid nulla obcaecati ea facilis voluptates nemo consequatur! Repudiandae, minima?
       </div>
       <div class="modal-footer">
           
       </div>
    </div>
</div>

  
</body>
</html>