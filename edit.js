function edit_char(n){
	if(n==0){
		document.getElementById("nameInput").style.display='block';
	}
	else if(n==1){
		document.getElementById("pronInput").style.display='block';
	}
	else if(n==2){
		document.getElementById("raceDropdown").style.display='block';
	}
	else if(n==3){
		document.getElementById("bgDropdown").style.display='block';
	}
	else if(n==4){
		document.getElementById("physDropdown").style.display='block';
	}
	else if(n==5){
		document.getElementById("mentDropdown").style.display='block';
	}
	else if(n==6){
		document.getElementById("spiritDropdown").style.display='block';
	}
	else if(n==7){
		document.getElementById("advDropdown").style.display='block';
	}
	else{
		document.getElementById("traitsDropdown").style.display='block';
	}

}

