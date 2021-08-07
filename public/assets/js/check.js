window.onload = function checkWorkStart() {
  let check = confirm('前回退勤が押されていないけど、本当に勤務開始しますか？');
  if (check == true) {
    document.getElementById('startWork').click();
  } else {
    document.getElementById('noRecord').click();
  }
}
