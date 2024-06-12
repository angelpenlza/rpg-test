const tiles = document.getElementById('tiles');
const userSize = document.getElementById('size');
const userTiles = document.getElementById('numTiles');
const userTime = document.getElementById('userTime');
const timer = document.getElementById('timer');
const score = document.getElementById('score');

const start = document.getElementById('start');

//-------constantly update the values depending on what is selected on the dropbox

let numSize = userSize.value;
let numTiles = userTiles.value;
let numTime = userTime.value;

let time = 10.00;

userSize.addEventListener('click', updateSize);

function updateSize() {
    let cur = numSize;
    numSize = userSize.value;
    if(numSize !== cur) {
        tiles.innerHTML = "";
        displayBoard(numSize);
    }
}

userTiles.addEventListener('click', updateTiles);

function updateTiles() {
    let cur = numTiles;
    numTiles = userTiles.value;
    if(numTiles !== cur) 
        console.log(numTiles);
}

userTime.addEventListener('click', updateTime);

function updateTime() {
    let cur = numTime;
    numTime = userTime.value;
    if(numTime !== cur) {
        time = Number(numTime);
        timer.innerText = "time: " + time.toFixed(2);
    }
        
}

//---------------------------------------------------------------------------------

//--------outputing the board------------------------------------------------------

function displayBoard(size) {
    for(let i = 0; i < size; i++) {
        let row = document.createElement('div');
        row.setAttribute('class', 'row');
        for(let j = 0; j < size; j++) {
            let box = document.createElement('div');
            box.setAttribute('class', 'box');
            box.setAttribute('id', `${(i * size) + j}`);
            row.appendChild(box);
        }
        tiles.appendChild(row);
    }
}

displayBoard(numSize);

//------some functions before the game starts--------------------------------------

let timerID;


function flipTimer() {
    if(start.className == "start") {
        start.className = "restart";
        start.innerText = "restart";
        
    }
}
