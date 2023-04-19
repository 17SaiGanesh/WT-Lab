const words = ["javascript", "programming", "computer", "internet", "developer", "website", "algorithm", "database", "framework", "interface"];

let word = "";
let input = "";
let timerId = 0;
let startTime = 0;
let endTime = 0;

function init() {
  word = words[Math.floor(Math.random() * words.length)];
  input = "";
  startTime = 0;
  endTime = 0;

  renderWord();
  renderTimer();
}

function renderWord() {
  const wordElement = document.querySelector("#word");
  wordElement.textContent = word;
}

function renderTimer() {
  const timerElement = document.querySelector("#timer");
  timerElement.textContent = "Start typing to begin!";

  clearInterval(timerId);
}

function startTimer() {
  startTime = Date.now();
  timerId = setInterval(() => {
    const elapsed = Math.floor((Date.now() - startTime) / 1000);
    const minutes = Math.floor(elapsed / 60);
    const seconds = elapsed % 60;
    const formattedTime = `${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
    const timerElement = document.querySelector("#timer");
    timerElement.textContent = `Time: ${formattedTime}`;
  }, 1000);
}

function handleInput() {
  const inputElement = document.querySelector("#input");
  input = inputElement.value.trim();

  if (!startTime) {
    startTimer();
  }

  if (input === word) {
    clearInterval(timerId);
    const elapsed = Math.floor((Date.now() - startTime) / 1000);
    const speed = Math.floor(word.length / (elapsed / 60));
    const timerElement = document.querySelector("#timer");
    timerElement.textContent = `You typed "${word}" in ${elapsed} seconds with a speed of ${speed} words per minute!`;
    inputElement.value = "";
    inputElement.disabled = true;
    setTimeout(init, 3000);
  }
}

init();

document.querySelector("#input").addEventListener("input", handleInput);
