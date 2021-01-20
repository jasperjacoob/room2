<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="design/facultyUI_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script/request.js"></script>
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
                    <th colspan="5" class="thead">
                        <?php
                        echo "<p id='date'>" . date("l") . "," . " " . date("Y/m/d") . "</p>";
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
                    <td >Library</td>
                    <td></td>
                    <td >Office</td>
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
                    <img src="image/calendar.svg" class="img-side">
                    <button class="btnSide" id="aboutBtn"> calendar </button>
                </div>
                <div>
                    <img src="image/logout.svg" class="img-side">
                    <button class="btnSide" id="logout"> logout</button>
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
                        <input name="professor" type="text" class="read" readonly>
                    </div>
                    <div>
                        <h5>DATE AND TIME:</h5>
                        <input name="dateTime" type="text" class="read" readonly>
                    </div>
                    <div>
                        <h5>COURSE:</h5>
                        <input name="course" type="text" class="read" readonly>
                    </div>
                    <div>
                       <h5>YEAR:</h5>
                       <input name="year" class = "read"  name="year" type="text" readonly>
                   </div>
                    <div>
                        <h5>SUBJECT CODE:</h5>
                        <input name="subject" type="text" class="read" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
    <!-- FOR Reservation List -->
    <div id="simpleModal3" class="modal">
        <div class="modal-content1">
            <div class="modal-header">
                <label id="roomNumber"></label>
            </div>
            <div class="modal-body">
                <ul id="roomlist">
                
                </ul>
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
                <form id="prof_res">
                    <div>
                        <h5>ROOM NO:</h5>
                        <select name="RoomNum">

                        </select>
                    </div>
                    <div>
                        <h5>PROFESSOR NAME:</h5>
                        <input type="text" name="Professor" id="profname" readonly>
                    </div>
                    <div>
                        <h5>DATE AND TIME:</h5>
                        <input id="timein" type="datetime-local" name="DateTime" required>
                        <input id= "timeout" name ="Timeout" type="time" required>
                    </div>
                    <div>
                        <h5>COURSE:</h5>
                        <select name="Course">

                        </select>
                    </div>
                    <div>
                        <h5>Year:</h5>
                        <select name="Year">

                        </select>
                    </div>
                    <div>
                        <h5>SUBJECT CODE:</h5>
                        <select name="SubjectCode">

                        </select>

                    </div>
                    <div class="modal-footer">
                    <label id="res_errormsg"></label>
                <button class="btnFooter">reserve</button>
                <input type="reset" value="RESET" class="btnFooter">
            </div>
                </form>
            </div>
            
        </div>
    </div>

    <!-- MODAL FOR CALENDAR -->
    <div id="simpleModal2" class="modal">
        <div class="container-cal">

            <div class="calendar">
                <div class="month">
                    <i class="fas fa-angle-left prev"></i>
                    <div class="date">
                        <h1> </h1>
                        <p> </p>
                    </div>
                    <i class="fas fa-angle-right next"></i>
                </div>
                <div class="weekdays">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div class="days">
                    <div class="prev-date">27</div>
                    <div class="prev-date">28</div>
                    <div class="prev-date">29</div>
                    <div class="prev-date">30</div>
                    <div class="prev-date">31</div>
                    <div>1</div>
                    <div>2</div>
                    <div>3</div>
                    <div>4</div>
                    <div>5</div>
                    <div>6</div>
                    <div>7</div>
                    <div>8</div>
                    <div>9</div>
                    <div>10</div>
                    <div>11</div>
                    <div>12</div>
                    <div>13</div>
                    <div class="today">14</div>
                    <div>15</div>
                    <div>16</div>
                    <div>17</div>
                    <div>18</div>
                    <div>19</div>
                    <div>20</div>
                    <div>21</div>
                    <div>22</div>
                    <div>23</div>
                    <div>24</div>
                    <div>25</div>
                    <div>26</div>
                    <div>27</div>
                    <div>28</div>
                    <div>29</div>
                    <div>30</div>
                    <div>31</div>
                    <div class="next-date">1</div>
                    <div class="next-date">2</div>
                    <div class="next-date">3</div>
                    <div class="next-date">4</div>
                    <div class="next-date">5</div>
                    <div class="next-date">6</div>
                </div>
            </div>
        </div>
       
        <script src="script/facultyCalendar.js"></script>
        <script src="script/faculty.js"></script>
</body>

</html>