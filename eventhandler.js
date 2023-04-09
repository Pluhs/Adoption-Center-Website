//time
function dateTime(){
    const date = new Date();
    const dateTime = date.toLocaleString();
    document.getElementById("time").innerHTML = dateTime;
    document.querySelector("body").onload = dateTime;
}
setInterval(dateTime,0);


function validation() {
  const types = document.getElementsByName("animal");
  const cbreed = document.getElementById("selectc");
  const dbreed = document.getElementById("selectd");
  const gender = document.getElementById("gender");
  const firstname = document.getElementById("FirstName");
  const lastname = document.getElementById("FamilyName");
  const email = document.getElementById("email");

  let typeselected = false;
  for (const type of types) {
    if (type.checked) {
      typeselected = true;
      break;
    }
  }
  if (!typeselected) {
    alert("Please select the type of animal");
    return false;
  }

  if (cbreed.value === "" && dbreed.value === "") {
    alert("Please select a breed");
    return false;
  }

  if (gender.value === "") {
    alert("Please select the gender");
    return false;
  }

  if (firstname.value.trim() === "") {
    alert("Please enter your first name");
    return false;
  }

  if (lastname.value.trim() === "") {
    alert("Please enter your last name");
    return false;
  }

  if (email.value.trim() === "") {
    alert("Please enter your email address");
    return false;
  }

  if (!emailvalidation(email.value.trim())) {
    alert("Please enter a valid email address");
    return false;
  }
  return true;
  
}
function emailvalidation (email) {
    const pattern = /^\S+@\S+\.\S+$/;
    return pattern.test(email);
}



document.addEventListener("DOMContentLoaded", () => {
    const loginform = document.querySelector("#login");
    document.querySelectorAll(".form_input").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
            if(e.target.id === "username" && !(/^[a-zA-Z0-9]+$/).test(e.target.value ))
                setinputerror(inputElement, "Username must have letters and digits only");

            if(e.target.id === "password" && e.target.value.length>0 && !(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+){4,}$/).test(e.target.value)){
                setinputerror(inputElement, "Password must have atleast 1 letter and 1 digit");
            }
            if(e.target.id === "password" && e.target.value.length>0 && e.target.value.length<4){
                setinputerror(inputElement, "Password must at least be 4 characters");
            }
        });
        inputElement.addEventListener("input", e => {
            clearinputerror(inputElement);
        });
        inputElement.addEventListener("focus", e => {
            clearform(loginform);
        });
    });
});

function setform(formElement, type, message){
    const messageE = formElement.querySelector(".form_message");
    messageE.textContent = message;
    messageE.classList.remove("form_message--success", "form_message--error");
    messageE.classList.add('form_message--' + type);
}

function clearform(formElement) {
    const messageE = formElement.querySelector(".form_message");
    messageE.textContent = "";
    messageE.classList.remove("form_message--success", "form_message--error");
}

function setinputerror(inputElement, message){
    inputElement.classList.add("form_input--error");
    inputElement.parentElement.querySelector(".form_input-error-message").textContent = message;
}

function clearinputerror(inputElement){
    inputElement.classList.remove("form_input--error");
    inputElement.parentElement.querySelector(".form_input-error-message").textContent = "";
}


// function validateLogin(event) {
//   event.preventDefault();

//   const form = document.getElementById('login');
//   const username = form.elements.username.value;
//   const password = form.elements.password.value;
//   fetch('login.txt')
//     .then(response => {
//       if (!response.ok) {
//         throw new Error('Network response was not ok');
//       }
//       return response.text();
//     })
//     .then(data => {
//       const users = data.split('\n').map(line => {
//         const [username, password] = line.split(':');
//         return {username, password};
//       });
//       const user = users.find(u => u.username === username && u.password === password);
//       if (user) {
//         sessionStorage.setItem('username', user.username);

//         document.getElementById('form1').style.display = 'none';
//         document.getElementById('form2').style.display = 'block';
//       } else {
//         alert('Invalid username or password');
//       }
//     });
// }

// document.addEventListener('DOMContentLoaded', function() {
//   const loginForm = document.getElementById('login');
//   loginForm.addEventListener('submit', validateLogin);
// });
function logout() {
  window.location.href = "logout.php";
}