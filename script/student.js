window.onload = function () {
PopulateSelect(1,'select[name="RoomNum"]');
PopulateSelect(0,'select[name="Course"]');
PopulateSelect(2,'select[name="Year"]');
PopulateSelect(4,'select[name="Professor"]');
PopulateSelect(7,'select[name="SubjectCode"]');
document.getElementById('timein').onchange = function (params) {
    let h = new Date($('#timein').val()).getTime();
    let g = new Date(h).toLocaleTimeString();
    let timeout = document.getElementById('timeout');
    timeout.min = g;
    timeout.max = "22:00:00";

    
};
$('button[class="btnFooter"]').on('click',function (params) {
    if(ValidateForms('#res_room')){
        PostRequest($('#res_room').serialize()+"&btn_name=btn_reserve",'#res_room');
        return false;
    }
});




    // get element modal for room availability
var modal = document.getElementById('simpleModal');

// get element modal for room reservation
var modal1 = document.getElementById('simpleModal1');

// get element modal for about modal
var modal2 = document.getElementById('simpleModal2');

// get button element for button reserve
var resModalBtn = document.getElementById('resModalBtn');

// get button element for button about
var aboutBtn = document.getElementById('aboutBtn');

// baka alam mo pano proper syntax dito na mas maikli, eto yung pag ni click yung 
// table data diko alam pano makuha element ng table data e
var modalBtn = document.getElementsByClassName('modalBtn');

//get element for close button in modal
var closeBtn = document.getElementsByClassName('closeBtn')[0];

//get element for close button in modal
var closeBtn1 = document.getElementsByClassName('closeBtn1')[0];

//get element for close button in modal
var closeBtn2 = document.getElementsByClassName('closeBtn2')[0];


// to open modal for room availability
for (let index = 0; index < modalBtn.length; index++) {
    const element = modalBtn[index];
    element.onclick = function () {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;
        let a = {"Desc": element.textContent ,"Date": today,"get_code":6};
        GetRequest(a,6);
        openModal();
            
    }
}



// to open modal for room reservation
resModalBtn.addEventListener('click', openModal1);

// to open modal for about 
aboutBtn.addEventListener('click', openModal2);


// event listener for close button
closeBtn.addEventListener('click', closeModal);

// event listener for close button in room reservation
closeBtn1.addEventListener('click', closeModal1);

// event listener for close button in room reservation
closeBtn2.addEventListener('click', closeModal2);

// event listener for clicking outside the modal in room avail and room res
window.addEventListener('click', outsideClick);
window.addEventListener('click', outsideClick1);
window.addEventListener('click', outsideClick2);

// function for opening modal for room availabiliy
function openModal(){
    
    modal.style.display = 'block';
}
//function for opening modal for room res
function openModal1(){
    modal1.style.display = 'block';
}
//function for opening about modal
function openModal2(){
    modal2.style.display = 'block';
}

//function for close button in room avail
function closeModal(){
    modal.style.display = 'none';
}

//function for close button in room res
function closeModal1(){
    modal1.style.display = 'none';
   
}

//function for close button in about
function closeModal2(){
    modal2.style.display = 'none';
   
}


function outsideClick(e){
    if(e.target == modal){
    modal.style.display = 'none';
    }
}

function outsideClick1(e){
    if(e.target == modal1){
    modal1.style.display = 'none';
    }
}

function outsideClick2(e){
    if(e.target == modal2){
    modal2.style.display = 'none';
    }
}
   
}