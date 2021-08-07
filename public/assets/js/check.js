window.onload = function checkWorkStart() {
  let check = confirm('前回退勤押してへんけど、ほんまにかまんの？');
  if (check == true) {
    document.getElementById('startWork').click();
  } else {
    document.getElementById('noRecord').click();
  }
}
