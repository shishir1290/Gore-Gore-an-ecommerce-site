function validateForm(loginform) {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    
    if (username == "" && password == "") {
      document.getElementById("login1").innerHTML = "Please fill in all fields.";
      document.getElementById("login1").style.display = "block";
        
      return false;
    }

    else if(username == ""){
      document.getElementById("login1").innerHTML = "Please fill username.";
      document.getElementById("login1").style.display = "block";
      
      return false;
    }

    else if(password == ""){
      document.getElementById("login1").innerHTML = "Please fill password.";
      document.getElementById("login1").style.display = "block";
      
      return false;
    }
    else if(password != "" && username != ""){

      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
          const resp = this.responseText;
          
          if (resp === 'success') {
              window.location.href = '../index.php';
              alert("Login sucessfully!");
          } else {
              document.getElementById('login1').innerHTML = resp;
              document.getElementById('login1').style.display = 'block';
          }
      }
      xhttp.open('POST', '../controller/loginAction.php', true);
      xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhttp.send('username=' + username + '&password=' + password);
      return false;


    }
    // else{
    //   // header("Location: ../index.php");

    //   window.location.href = "../index.php";
    //   return true;

    // }
    

}



function myFunction(showpassword) {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

