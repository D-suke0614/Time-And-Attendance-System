// function cal() {
//   let stamp = document.getElementById('stamp').innerText;
//   let message = stamp + 'しますか？';

//   if (stamp == '勤務開始') {
//     if (confirm(message)) {

//       document.getElementById('stamp').innerText = '退勤する';
//     }

//   } else {
//     if (confirm(message)) {
//       document.getElementById('stamp').innerText = '勤務開始';
//     }
//   }
// }

function time() {
  dd = new Date();
  Yr = dd.getFullYear() + "-";
  Mn = dd.getMonth() + 1 + "-";
  Dt = dd.getDate() + " ";
  Hr = dd.getHours() + ":";
  Mi = dd.getMinutes() + ":";
  Se = dd.getSeconds();

  let nowTime = Yr + Mn + Dt + Hr + Mi + Se;

  // document.time.value = Yr + Mn + Dt + Hr + Mi + Se ;
  document.getElementById('time').value = nowTime;
  // console.log(nowTime);

  // window.setTimeout("time()",1000);
}
