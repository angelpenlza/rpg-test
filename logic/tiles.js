const boxes = document.querySelectorAll('.box');
const start = document.getElementById('start');
const time = document.getElementById('time');
const score = document.getElementById('score');
const handlers = new Map();
let timer = 10.00;  
let scoreNum = 0;
let timerID; 
let handler;

time.innerText = timer.toFixed(2);
score.innerText = scoreNum;

function flipTimer() {
    if(start.className == "start") {
        start.className = "restart";
        start.innerText = "restart";
        timerID = setInterval(function () {
            timer--;
            time.innerText = timer.toFixed(2);
            if(timer == 0) {
                boxes.forEach(box => {
                    box.className = "box";
                    box.removeEventListener('click', handler);
                });
                clearInterval(timerID);
            }
        }, 1000);
    } else if(start.className == "restart") {
        start.className = "start";
        start.innerText = "start";
        timer = 10.00;
        scoreNum = 0;
        time.innerText = timer.toFixed(2);
        score.innerText = scoreNum;
        clearInterval(timerID);
    }
}

function startGame() {
    flipTimer();
    if(start.className == "restart") {
        console.log('started');
        boxes[Math.floor(Math.random() * 16)].className = "target";
        boxes.forEach(box => {
            handler = play(box);
            handlers.set(box, handler);
            box.addEventListener('click', handler);
        });
    } else if(start.className == "start") {
        end();
    } else {
        console.error("error");
    }
}

function play(userBox) {
    return function () {
        console.log('clicked');
        if(userBox.className == "target") {
            scoreNum++;
            score.innerText = scoreNum;
            userBox.className = "box";
            boxes[Math.floor(Math.random() * 16)].className = "target";
        } else if(userBox.className == "box") {
            flipTimer();
            end();
        }
    }
}

function end() {
    console.log('ended');
    boxes.forEach(box => {
        box.className = "box";
        handler = handlers.get(box);
        if(handler) 
            box.removeEventListener('click', handler);
    });
    

}

start.addEventListener('click', startGame);

 