let timer;
let seconds = 0;

// Inisialisasi tampilan
function updateDisplay() {
  let mins = Math.floor(seconds / 60);
  let secs = seconds % 60;
  document.getElementById("display").innerText =
    String(mins).padStart(2, '0') + ":" + String(secs).padStart(2, '0');
}

function startTimer() {
  if (!timer) {
    timer = setInterval(() => {
      seconds++;
      updateDisplay();
    }, 1000);
  }
}

function stopTimer() {
  clearInterval(timer);
  timer = null;

  // Kirim ke server
  fetch('save_time.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'time=' + seconds
  });
}

function resetTimer() {
  stopTimer();
  seconds = 0;
  updateDisplay();
}
