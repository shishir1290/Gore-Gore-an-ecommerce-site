

// function validateForm(registrationform) {
//   var firstName = document.getElementById("first_name").value;
//   var lastName = document.getElementById("last_name").value;
//   var gender = document.getElementById("gender").value;
//   var email = document.getElementById("email").value;
//   var phone = document.getElementById("phone").value;
//   var dob = document.getElementById("dob").value;
//   var address = document.getElementById("address").value;
//   var username = document.getElementById("username").value;
//   var password = document.getElementById("password").value;
//   // var image = document.getElementById("image").value;

//   // var alertMsg = "";

//   if (firstName == "") {
//     document.getElementById("registrationAlert").innerHTML = "First name cannot be empty.";
//     document.getElementById("registrationAlert").style.display = "block";
//     return false;
//     // alertMsg += "First name cannot be empty.\n";
//   }

//   if (lastName == "") {
//     document.getElementById("registrationAlert").innerHTML = "Last name cannot be empty.";
//     document.getElementById("registrationAlert").style.display = "block";
//     return false;
//     // alertMsg += "Last name cannot be empty.\n";
//   }

//   if (gender == "") {
//     document.getElementById("registrationAlert").innerHTML = "Gender must be selected.";
//     document.getElementById("registrationAlert").style.display = "block";
//     return false;
//     // alertMsg += "Gender must be selected.\n";
//   }

//   if (email == "") {
//     document.getElementById("registrationAlert").innerHTML = "Email cannot be empty.";
//     document.getElementById("registrationAlert").style.display = "block";
//     return false;
//     // alertMsg += "Email cannot be empty.\n";
//   } else {
//     var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//     if (!emailRegex.test(email)) {
//       document.getElementById("registrationAlert").innerHTML = "Invalid email format.";
//       document.getElementById("registrationAlert").style.display = "block";
//       return false;
//       // alertMsg += "Invalid email format.\n";
//     }
//   }

//   if (phone == "") {
//     document.getElementById("registrationAlert").innerHTML = "Phone cannot be empty.";
//     document.getElementById("registrationAlert").style.display = "block";
//     return false;
//     // alertMsg += "Phone cannot be empty.\n";
//   } else {
//     var phoneRegex = /^\d{10}$/;
//     if (!phoneRegex.test(phone)) {
//       document.getElementById("registrationAlert").innerHTML = "Invalid phone number format.";
//       document.getElementById("registrationAlert").style.display = "block";
//       return false;
//       // alertMsg += "Invalid phone number format.\n";
//     }
//   }

//   if (dob == "") {
//     document.getElementById("registrationAlert").innerHTML = "Date of birth cannot be empty.";
//     document.getElementById("registrationAlert").style.display = "block";
//     return false;

//     // alertMsg += "Date of birth cannot be empty.\n";
//   }

//   if (address == "") {
//     document.getElementById("registrationAlert").innerHTML = "Address cannot be empty.";
//     document.getElementById("registrationAlert").style.display = "block";
//     return false;
//     // alertMsg += "Address cannot be empty.\n";
//   }

//   if (username == "") {
//     document.getElementById("registrationAlert").innerHTML = "Username cannot be empty.";
//     document.getElementById("registrationAlert").style.display = "block";
//     return false;
//     // alertMsg += "Username cannot be empty.\n";
//   }

//   if (password == "") {
//     document.getElementById("registrationAlert").innerHTML = "Password cannot be empty.";
//     document.getElementById("registrationAlert").style.display = "block";
//     return false;
//     // alertMsg += "Password cannot be empty.\n";
//   } else {
//     var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
//     if (!passwordRegex.test(password)) {
//       document.getElementById("registrationAlert").innerHTML = "Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.";
//       document.getElementById("registrationAlert").style.display = "block";
//       return false;
//       // alertMsg += "Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.\n";
//     }
//   }

//   // if (image == "") {
//   //   alertMsg += "Profile picture must be uploaded.\n";
//   // }

//   // if (alertMsg != "") {
//   //   alert(alertMsg);
//   //   return false;
//   // }

//   return true;
// }


function validateForm(registrationform) {
  var firstName = document.getElementById("first_name").value;
  var lastName = document.getElementById("last_name").value;
  var gender = document.getElementById("gender").value;
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;
  var dob = document.getElementById("dob").value;
  var address = document.getElementById("address").value;
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  var alertMsg = "";

  if (firstName == "") {
    alertMsg += "First name cannot be empty.\n";
  }

  if (lastName == "") {
    alertMsg += "Last name cannot be empty.\n";
  }

  if (gender == "") {
    alertMsg += "Gender must be selected.\n";
  }

  if (email == "") {
    alertMsg += "Email cannot be empty.\n";
  } else {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alertMsg += "Invalid email format.\n";
    }
  }

  if (phone == "") {
    alertMsg += "Phone cannot be empty.\n";
  } else {
    var phoneRegex = /^\d{10}$/;
    if (!phoneRegex.test(phone)) {
      alertMsg += "Invalid phone number format.\n";
    }
  }

  if (dob == "") {
    alertMsg += "Date of birth cannot be empty.\n";
  }

  if (address == "") {
    alertMsg += "Address cannot be empty.\n";
  }

  if (username == "") {
    alertMsg += "Username cannot be empty.\n";
  }

  if (password == "") {
    alertMsg += "Password cannot be empty.\n";
  } else {
    var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (!passwordRegex.test(password)) {
      alertMsg += "Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.\n";
    }
  }

  if (alertMsg != "") {
    document.getElementById("registrationAlert").innerHTML = alertMsg;
    document.getElementById("registrationAlert").style.display = "block";
    // alert(alertMsg);
    return false;
  }

  return true;
}
