lastReceived = 0;

// Hide the message form
function hideShow(hs) {
    if (hs == "hide") {
        signInForm.signInButt.value = "Sign in"
        signInForm.signInButt.name = "signIn"
        chatBox.style.display = "none"
        chatdox.style.display = "block"
        messageForm.style.display = "none"
        usersOnLine.style.display = "none"
        signInForm.userName.style.display = "block"
        signInForm.password.style.display = "block"
        signInName.innerHTML = ""
       // chatBox.style.display = "none"
    }
    if (hs == "show") {
        signInForm.signInButt.value = "Sign out"
        signInForm.signInButt.name = "signOut"
        chatBox.style.display = "block"
        messageForm.style.display = "block"
        usersOnLine.style.display = "block"
        chatdox.style.display = "none"
        signInForm.userName.style.display = "none"
        signInForm.password.style.display = "none"
        signInName.innerHTML = signInForm.userName.value
    }
}


// Sign in and Out
function mainFunction() {
    if (signInForm.userName.value == "" || signInForm.userName.value.indexOf(" ") > -1) {
        alert("Invalid Username or Password. Please Try again");
        signInForm.userName.focus();
        return false;
    }
    
      if (signInForm.password.value == "" || signInForm.password.value.indexOf(" ") > -1) {
        alert("Invalid Username or Password. Please Try again.");
        signInForm.password.focus();
        return false;
    }

// Sign in
    if (signInForm.signInButt.name == "signIn") {
        data = "user=" + signInForm.userName.value + "&pass=" + signInForm.password.value + "&oper=signin"
        Ajax_Send("POST", "users.php", data, checkSignIn);
        return false
    }

// Sign out
    if (signInForm.signInButt.name == "signOut") {
        data = "user=" + signInForm.userName.value + "&oper=signout"
        Ajax_Send("POST", "users.php", data, checkSignOut);
        return false
    }
}

// Sign in response
function checkSignIn(res) {
    if (res == "userexist") {
        alert("The user name you typed is already exist\nPlease try another one");
        return false;
    }  
    if (res == "passwrong") {
        alert("Invalid Username or Password. Please try again.");
        return false;
    }
    
    
    if (res == "signin") {
        hideShow("show")

        messageForm.message.focus()
        updateInterval = setInterval("updateInfo()", 1500);
    }
}

// Sign out response
function checkSignOut(res) {
    if (res == "usernotfound") {
        res = "signout"
    }
    if (res == "signout") {
        hideShow("hide")
        signInForm.userName.focus()
        clearInterval(updateInterval)
        return false
    }
}

// Update info
function updateInfo() {
    Ajax_Send("POST", "users.php", "", showUsers)
    Ajax_Send("POST", "receive.php", "lastreceived=" + lastReceived, showMessages)
}

// update online users
function showUsers(res) {
    usersOnLine.innerHTML = res
}

// Update messages view
function showMessages(res) {
    msgTmArr = res.split("<SRVTM>")
    lastReceived = msgTmArr[1]
    messages = document.createElement("span")
    messages.innerHTML = msgTmArr[0]
    chatBox.appendChild(messages)
    chatBox.scrollTop = chatBox.scrollHeight
}

// Send message
function sendMessage() {
    data = "message=" + messageForm.message.value + "&user=" + signInForm.userName.value
    Ajax_Send("POST", "send.php", data, sentOk)
}

// Sent Ok
function sentOk(res) {
    if (res == "sentok") {
        messageForm.message.value = ""
        messageForm.message.focus()
    }
    
}