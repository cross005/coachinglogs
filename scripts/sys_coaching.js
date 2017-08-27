function check(){
var a = document.getElementById('agent_name').value;
var b = document.getElementById('os').value;
	if(a == "Agent"){
		alert("Please select an agent");
		return false;
	}

	if(b == "OS"){
		alert("Please select a supervisor");
		return false;
	}		

}
