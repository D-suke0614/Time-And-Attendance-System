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
