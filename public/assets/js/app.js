// Toggle dark mode
let toggledark = document.querySelector('#toggledark');
if (toggledark) {
  toggledark.addEventListener('click', function () {
    let mode = getCookie("dayNight");
    let d = new Date();
    d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000)); //365 days
    let expires = "expires=" + d.toGMTString();
    if (mode == "dark") {
      document.cookie = "dayNight" + "=" + "light" + "; " + expires + ";path=/";
      document.getElementsByTagName('body')[0].classList.remove('dark');
    } else {
      document.cookie = "dayNight" + "=" + "dark" + "; " + expires + ";path=/";
      document.getElementsByTagName('body')[0].classList.add('dark');
    }
  });
}

// TODO: move to util
function getCookie(cname) {
  let name = cname + "=";
  let ca = document.cookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) === 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}