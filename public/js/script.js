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
        console.log(timer);
        if (--timer < 0) {
            localStorage.removeItem("url_submit");
            clearInterval(refreshIntervalId);
            display.style.display="none";
        }
    }, 1000);
}


function WaitFortwoMin() {
    var Minutes = 60 * 2,
    display = document.querySelector('#timer');
    startTimer(Minutes, display);

};

function check_storage(){

    document.querySelector('#timer').style.display="block";
    if (localStorage.getItem("url_submit")) {
        WaitFortwoMin();
    }
}

check_storage();


livewire.on("save_url",timer=>{
    // console.log(timer+120);
    // console.log(new Date().getTime());
    document.querySelector('#timer').style.display="block";
    localStorage.setItem("url_submit", timer);
    WaitFortwoMin();
});
