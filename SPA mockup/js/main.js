// Set the target date and time
const targetDate = new Date(2026, 0, 1, 0, 0, 0).getTime();

// Update the countdown every second
const countdownInterval = setInterval(updateCountdown, 1000);

var width = window.innerWidth;
var height = window.innerHeight;

console.log(`The width is: ${width} and the height is ${height}`);

function updateCountdown() {
  const currentDate = new Date().getTime();
  const timeDifference = targetDate - currentDate;
  console.log(timeDifference);
  if (timeDifference <= 0) {
    // If the countdown is over, display a message 
    clearInterval(countdownInterval);
    document.querySelector(".secondBlockOne").innerHTML = "Countdown is over!";
  } else {
    // Calculate days, hours, minutes, and seconds -

    const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

    // Display the countdown
    document.getElementById("hours").innerHTML = `${hours}<p class='infoTab'>hours</p>`;
    document.getElementById("minutes").innerHTML = `${minutes}<p class='infoTab'>minutes</p>`;
    document.getElementById("seconds").innerHTML = `${seconds}<p class='infoTab'>seconds</p>`;
  }
}



//Clear field on click////////////////////////////////////////////////////////////////////////////////////////////
let emailField = document.querySelector(".emailForm");
let errorBox = document.querySelector(".errorBox");
const specialSymbolPattern = /[!#$%^&*()_+\-=\[\]{};':"\\|,<>\/?]/;

emailField.addEventListener(`click`, function () {
  emailField.value = "";
});
//Validation for Email field

function validate() {
  if (emailField.value === "") {
    errorBox.classList.remove("hidden");
    errorBox.innerHTML = "Email field cannot be empty!";
    return false;
  } else if (emailField.value.length >= 20) {
    errorBox.classList.remove("hidden");
    errorBox.innerHTML = "Email field cannot be more than 20 symbols!";
    return false;
  } else if (emailField.value.length <= 8) {
    errorBox.classList.remove("hidden");
    errorBox.innerHTML = "Email field cannot be less than 8 symbols!";
    return false;
  } else if (specialSymbolPattern.test(emailField.value)) {
    errorBox.classList.remove("hidden");
    errorBox.innerHTML = "Email field cannot contain special symbols!";
    return false;

  } else if (emailField.value === "Your Email") {
    errorBox.classList.remove("hidden");
    errorBox.innerHTML = "Please enter your email!";
    return false;
  }
  else {

    errorBox.classList.remove("hidden");
    errorBox.innerHTML = "Thank you for subscribing!";
    return true;

  }
}



