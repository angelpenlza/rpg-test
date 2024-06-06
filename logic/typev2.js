//------------outputs the words to the page-----------
const wordBank = [  "if", "or", "by", "to", "we", "ad",
                    "and", "how", "why", "lie", "bye", "cry", "tie", "wet", "red", "bed", "end",
                    "game", "lame", "tame", "week", "hand", "foot", "feet", "wind", "nail",
                    "mouse", "phone", "shoes", "skate", "horse", "pants", "light", "fight",
                    "sweater", "computer", "curtain", "mountain", "keyboard", "bedroom", 
                    "angel", "greeting", "public", "target", "cart", "shop", "badge", "clear", 
                    "code", "program", "sing", "music", "play", "rap", "dance", "enjoy", "linger", 
                    "book", "read", "learn", "grow", "stuck", "existential", "depression"];
const words = document.getElementById('words');
let word;
let curWords;
function generate() {
        word = ""; 
    for(let i = 0; i < 150; i++) {
        word += wordBank[Math.floor(Math.random() * wordBank.length)];
        word += " ";
    } 
    for(let i = 0; i < word.length; i++) {
        const newChar = document.createElement('p');
        newChar.innerText = word[i];
        newChar.setAttribute('class', 'char');
        words.appendChild(newChar);
    }
    curWords = document.querySelectorAll('.char');
}
generate();
//-----------------------------------------------------
const start = document.getElementById('userInput');
start.focus();
start.addEventListener('keydown', startTime);
start.addEventListener('keydown', check);

const timer = document.getElementById('timer');
let time = 30.00;
let timerID;
function startTime() {
    start.removeEventListener('keydown', startTime);
    timerID = setInterval(function() {
        time--;
        timer.innerText = "time: " + time.toFixed(2);
        if(time == 0) {
            clearInterval(timerID) 
            start.removeEventListener('keydown', check)
            score();
        }
    }, 1000);
}
//-----------refresh button----------------------------
const refresh = document.getElementById('refresh');
refresh.addEventListener('click', function () {
    start.addEventListener('keydown', startTime);
    start.addEventListener('keydown', check)
    words.innerHTML = '';
    generate();
    time = 30.00;
    timer.innerText = "time: " + time.toFixed(2);
    clearInterval(timerID);
    start.focus();
    index = 0;
    correct = 0;
    attempted = 0;
});
//------------------------------------------------------
let correct = 0;
let attempted = 0;
let index = 0;
function check(e) {
    attempted++;
    if(index > 0 && e.key == 'Backspace') {
        index--;
        curWords[index].setAttribute('class', 'char');
    } else if(e.key === word[index]) {
        curWords[index].setAttribute('class', 'correct');
        index++;
        correct++;
    } else if(e.code !== word[index]) {
        curWords[index].setAttribute('class', 'incorrect');
        index++;
    }
}

const acc = document.getElementById('acc');
const WPM = document.getElementById('wpm');
function score() {
    let accuracy = (correct / attempted) * 100;
    let wpm = Math.ceil((correct / word.length) * 300);
    acc.innerHTML = "accuracy: " + accuracy.toFixed(2);
    WPM.innerHTML = "wmp: " + wpm;
    sendData(wpm);
}

function sendData(score) {
    console.log('in the function');
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../pages/process.php', true);
    xhr.onreadystatechange = function () {
        WPM.innerHTML = score;
    };
    xhr.send('value=' + encodeURIComponent(score));
}