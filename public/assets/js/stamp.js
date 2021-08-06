function cal() {
  let stamp = document.getElementById('stamp').innerText;
  let message = stamp + 'しますか？';

  if (stamp == '勤務開始') {
    if (confirm(message)) {

      document.getElementById('stamp').innerText = '退勤する';
    }

  } else {
    if (confirm(message)) {
      document.getElementById('stamp').innerText = '勤務開始';
    }
  }
}


function checkWorkStart() {
  let check = confirm('勤務開始しますか？');
  if (check == true) {
    document.getElementById('startWork').click();
  } else {
    return false;
  }
}

function checkWorkEnd() {
  let check = confirm('退勤しますか？');
  if (check == true) {
    document.getElementById('endWork').click();
  } else {
    return false;
  }
}
