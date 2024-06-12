const boxes = document.querySelectorAll('.box');
const start = document.getElementById('start');
const time = document.getElementById('time');
const score = document.getElementById('score');
const grid = document.getElementById('grid');
const overBox = document.getElementById('overBox');
const handlers = new Map();
let timer = 10.00;  
let scoreNum = 0;
let timerID; 
let handler;
let currScore = scoreNum;

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
                end("time's up", scoreNum);
                flipTimer();
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
        clearBox();
        console.log('started');
        boxes[Math.floor(Math.random() * 16)].className = "target";
        boxes.forEach(box => {
            handler = play(box);
            handlers.set(box, handler);
            box.addEventListener('click', handler);
        });
    } else if(start.className == "start") {
        end("game over", currScore);
    } else {
        console.error("error");
    }
}

function play(userBox) {
    return function () {
        currScore = scoreNum;
        console.log('clicked');
        if(userBox.className == "target") {
            scoreNum++;
            currScore = scoreNum;
            score.innerText = scoreNum;
            userBox.className = "box";
            boxes[Math.floor(Math.random() * 16)].className = "target";
        } else if(userBox.className == "box") {
            flipTimer();
            end("game over", currScore);
        }
    }
}

function end(text, s) {
    console.log('ended');
    boxes.forEach(box => {
        box.className = "box";
        handler = handlers.get(box);
        if(handler) 
            box.removeEventListener('click', handler);
    });
    overText(text, s);
}

function overText(text, s) {
    overBox.setAttribute('class', 'game-over');
    const overTitle = document.createElement('h3');
    overTitle.setAttribute('class', 'over-title');
    overTitle.innerText = text;
    overBox.appendChild(overTitle);
    grid.appendChild(overBox);
    const showScore = document.createElement('p');
    showScore.setAttribute('class', 'over-title');
    showScore.innerText = "score: " + s;
    overBox.appendChild(showScore);
    const clear = document.createElement('button');
    clear.setAttribute('class', 'clear');
    clear.innerText = "restart";
    clear.addEventListener('click', clearBox);
    overBox.appendChild(clear);
}

function clearBox() {
    overBox.innerHTML = "";
    overBox.removeAttribute('class');
}

start.addEventListener('click', startGame);

 