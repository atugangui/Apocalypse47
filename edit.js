function edit_char(n){
	if(n==1){
		document.getElementById("physDropdown").style.display='block';
	}
	else if(n==2){
		document.getElementById("mentDropdown").style.display='block';
	}
	else if(n==3){
		document.getElementById("spiritDropdown").style.display='block';
	}
	else if(n==4){
		document.getElementById("advDropdown").style.display='block';
	}
	else{
		document.getElementById("traitsDropdown").style.display='block';
	}
}

