function changePassword(changePassword) {
    var currentPassword = document.getElementById("currentPassword").value;
    var newPassword = document.getElementById("newPassword").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    
    if (confirmPassword == "" && newPassword == "" && confirmPassword == "") {
      document.getElementById("changePass").innerHTML = "Please fill in all fields.";
      document.getElementById("changePass").style.display = "block";
        
      return false;
    }

    if (confirmPassword == "") {
      document.getElementById("changePass").innerHTML = "Please fill current password.";
      document.getElementById("changePass").style.display = "block";
        
      return false;
    }

    if (newPassword == "") {
      document.getElementById("changePass").innerHTML = "Please fill new password.";
      document.getElementById("changePass").style.display = "block";
        
      return false;
    }

    if (confirmPassword == "") {
      document.getElementById("changePass").innerHTML = "Please fill confirm password.";
      document.getElementById("changePass").style.display = "block";
        
      return false;
    }
  }