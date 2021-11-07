// document.getElementsByClassName("carousel").carousel({
    // interval: 2000
//   });
    function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    let refreshIntervalId = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = 'Wait For '+ minutes + ":" + seconds + " Seconds";
        if (--timer < 0) {
            localStorage.removeItem("url_submit");
            clearInterval(refreshIntervalId);
            display.style.display="none";
            document.querySelector('#url').removeAttribute("disabled");
            document.querySelector('#btn').removeAttribute("disabled");
        }
    }, 1000);
}


function WaitFortwoMin(timer = 60 * 2 ) {
    var Minutes = timer,
    display = document.querySelector('#timer');
    startTimer(Minutes, display);

};

function check_storage(){

    document.querySelector('#timer').style.display="block";

    if (localStorage.getItem("url_submit")) {
        if(localStorage.getItem("url_submit") > new Date().getTime()){
            // let timer = ((localStorage.getItem("url_submit") - new Date().getTime()/1000)/60);
            WaitFortwoMin();
        }
    }
}

check_storage();

livewire.on("save_url",timer=>{
    document.querySelector('#timer').style.display="block";
    document.querySelector('#url').setAttribute("disabled",true);
    document.querySelector('#btn').setAttribute("disabled",true);
    localStorage.setItem("url_submit",Number(String(timer+"000"))+120000);
    WaitFortwoMin();
});
