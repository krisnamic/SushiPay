let captcha = new Array();

function createCaptcha() {
  const activeCaptcha = document.getElementById("captcha");
  for (q = 0; q < 6; q++) {
    if (q % 2 == 0) {
      captcha[q] = String.fromCharCode(Math.floor(Math.random() * 26 + 65));
    } else {
      captcha[q] = Math.floor(Math.random() * 10 + 0);
    }
  }

  theCaptcha = captcha.join("");
  activeCaptcha.innerHTML = `${theCaptcha}`;
}


function validateCaptcha() {
  const errCaptcha = document.getElementById("errCaptcha");
  const reCaptcha = document.getElementById("reCaptcha");
  recaptcha = reCaptcha.value;
  let validateCaptcha = 0;
  for (var z = 0; z < 6; z++) {
    if (recaptcha.charAt(z) != captcha[z]) {
      validateCaptcha++;
    }
  }
  if (recaptcha == "") {
    errCaptcha.style.color = "red";
    errCaptcha.innerHTML = "Re-Captcha must be filled";
  } else if (validateCaptcha > 0 || recaptcha.length > 6) {
    errCaptcha.style.color = "red";
    errCaptcha.innerHTML = "Wrong captcha";
  } else {
    errCaptcha.style.color = "green";
    errCaptcha.innerHTML = "Done";
    document.getElementById("login-btn").disabled = false;
    document.getElementById("captcha-box").style.display = "none";
    document.getElementById("captcha-title").style.display = "none";
    document.getElementById("valid").style.display = "block";
  }
}
