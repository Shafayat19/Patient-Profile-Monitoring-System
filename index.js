firebase.auth().onAuthStateChanged(function (user) {
  if (user) {
    window.location = "patient.html";
  } else {
    //window.location = "login.html";
  }
});

function login() {

  var userEmail = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  firebase.auth().signInWithEmailAndPassword(userEmail, password).catch(function (error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;

    window.alert("Error: \n"+ errorMessage);
    // ...
  });
}

