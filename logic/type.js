const wordBank = [  "if", "or", "by", "to", "we", "ad",
                    "and", "how", "why", "lie", "bye", "cry", "tie", "wet", "red", "bed", "end",
                    "game", "lame", "tame", "week", "hand", "foot", "feet", "wind", "nail",
                    "mouse", "phone", "shoes", "skate", "horse", "pants", "light", "fight",
                    "sweater", "computer", "curtain", "mountain", "keyboard", "bedroom", 
                    "angel", "greeting", "public", "target", "cart", "shop", "badge", "clear", 
                    "code", "program", "sing", "music", "play", "rap", "dance", "enjoy", "linger", 
                    "book", "read", "learn", "grow", "stuck", "existential", "depression"];
let wordSet = [];

const words = document.getElementById('words');
const refresh = document.getElementById('refresh');
const userInput = document.getElementById('myWord');
const time = document.getElementById('timer');
const showWPM = document.getElementById('wpm');
const showAcc = document.getElementById('accuracy');
let wBank;
let generator = ""; 
let currWord;
let timerID;
let timer = 30.00;
let index = 0;
let wpm = 0; 
let correctWords = 0;
let accuracy = 0;
time.innerText = timer.toFixed(2);

function generateWords() {
    clearInterval(timerID);
    timer = 30.00;
    time.innerText = timer.toFixed(2);
    userInput.value = "";
    index = 0;
    correctWords = 0;
    wpm = 0;
    userInput.addEventListener('keydown', startGame);

    for(let i = 0; i < 100; i++) {
        let x = Math.floor(Math.random() * wordBank.length);
        currWord = wordBank[x];
        wordSet[i] = currWord;
        const w = document.createElement("p");
        w.setAttribute('class', 'word');
        w.innerHTML = currWord + " ";
        words.appendChild(w);
    }   
    wBank = document.querySelectorAll('.word');
    console.log(wBank);
}

function clear() {
    words.innerText = "";
}

// make sure the refresh button clears the words and generates new ones
refresh.addEventListener('click', clear);
refresh.addEventListener('click', generateWords);

function startGame() {
// removing the timer so that it only starts once
    userInput.removeEventListener('keydown', startGame);
// starting the timer
        timerID = setInterval(function () {
            timer--;
            time.innerText = timer.toFixed(2);
            if(timer == 0) {
                clearInterval(timerID);
                userInput.removeEventListener('keydown', checkWord);
                getScore();
            }
        }, 1000);
//------------ game code ----------------//
    userInput.addEventListener('keydown', checkWord);
//---------------------------------------//

}

function checkWord(e) {
        wBank[index].className = "curr";
        if(e.key == ' ') {
            if(userInput.value == wordSet[index]) {
                correctWords++;
                wBank[index].className = "correct";
                console.log("you're good");
            } else {
                wBank[index].className = "wrong";
                console.log("nah");
            }
            index++;
            e.preventDefault();
            userInput.value = '';
            console.log('the space bar has been pressed');
            
        }
}

function getScore() {
    wpm = (correctWords + 1) * 2;
    showWPM.innerText = "wpm: " + wpm; 
    accuracy = (correctWords / index) * 100;
    showAcc.innerText = "accuracy: " + accuracy.toFixed(2) + "%"; 
}

// initial start game 
generateWords();

userInput.addEventListener('keydown', startGame);



