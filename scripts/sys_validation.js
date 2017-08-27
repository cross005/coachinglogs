	function checkPass()
	{
	    //Store the password field objects into variables ...
	    var pass1 = document.getElementById('pass1');
	    var pass2 = document.getElementById('pass2');
	    //Store the Confimation Message Object ...
	    var message = document.getElementById('confirmMessage');
	    //Set the colors we will be using ...
	    var goodColor = "#66cc66";
	    var badColor = "#ff6666";
	    //Compare the values in the password field 
	    //and the confirmation field
	    if(pass1.value == pass2.value){
	        //The passwords match. 
	        //Set the color to the good color and inform
	        //the user that they have entered the correct password 
	        pass2.style.backgroundColor = goodColor;
	        message.style.color = goodColor;
	        message.innerHTML = "Password Matched! Now please click the Change Now button below."
	        document.getElementById("submit").disabled = false;	
	    }

	    else{
	        //The passwords do not match.
	        //Set the color to the bad color and
	        //notify the user.
	        pass2.style.backgroundColor = badColor;
	        message.style.color = badColor;
	        message.innerHTML = "Passwords did not match!"
	        document.getElementById("submit").disabled = true;	
	    }
	}

	function togglePass(element){
		var message = document.getElementById('confirmMessage_old');
		var agent_pass = document.getElementById('agent_pass').value;
		var old_pass = document.getElementById('old_pass').value;

		if(agent_pass != old_pass){
			message.innerHTML = "The entered temporary password is incorrect!"
			document.getElementById("submit").disabled = true;	
		}
		if(agent_pass == old_pass){
			message.innerHTML = "Password match!"
		}

	}
    function theFunction () {

	    if (confirm("Password has been change successfully. Click ok to continue")) {
	    } else {
	        return false;
	    }

    }	 