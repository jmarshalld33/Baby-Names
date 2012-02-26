//  This program populates a page with information 
//  about baby name popularity over the past decades


var NUM_CALLS = 0;   //Used to keep only two name data on the graph at once


window.onload = function() {
	babySelect();
	$("babyselect").observe("change", pageData);
	clearButton();
	$("Clear").observe("click", clearGraph);
};

// Creates a "Clear" button that clears the graph and name meaning
function clearButton() {
	var clear = document.createElement("button");
	clear.style.height = 25 + "px";
	clear.style.width = 45 + "px";
	clear.id = "Clear";
	clear.innerHTML = "Clear";
	$("namearea").appendChild(clear);
}

// When clear button is clicked, clears graph and name meaning and any error text
function clearGraph() {
	$("graph").innerHTML = "";
	$("meaning").innerHTML = "";
	$("errors").innerHTML = "";
}
	
//This function retrieves baby name data from webster
function babySelect() {
	new Ajax.Request("https://webster.cs.washington.edu/cse190m/babynames.php", {
		method: "get",
		parameters: {"type" : "list"},
		onSuccess: populateNames,
		onFailure: ajaxFailure,
		onException: ajaxFailure
	});
}

//This function populates the list of baby names with data
function populateNames(ajax) {
	var names = ajax.responseText.strip().split("\n");
	names.sort();
	$("babyselect").enable();
	for (var i = 0; i < names.length; i++) {
		var option = document.createElement("option");
		option.innerHTML = names[i];
		option.value = names[i];
		$("babyselect").appendChild(option);
	}
}

//This function fetches the name meaning data and the
//graph data and sends it to their respective functions
function pageData() {
	if (this.value != "") {                  
		if (NUM_CALLS == 2) {					// If there is data from two names up, clear the graph
			$("graph").innerHTML = "";
			NUM_CALLS = 0;
		}
		new Ajax.Request("https://webster.cs.washington.edu/cse190m/babynames.php", {
				method: "get",
				parameters: {"type" : "rank", "name" : this.value},
				onSuccess: graphData,
				onFailure: ajaxFailure,
				onException: ajaxFailure
		});
		$("meaning").innerHTML ="";
		new Ajax.Updater({ success : "meaning" }, "https://webster.cs.washington.edu/cse190m/babynames.php", {
			method: "get",
			parameters: {"type" : "meaning", "name" : this.value}
		});
	}
}
	
//This function puts the bars, rank number, and year into the graph
function graphData(ajax) {
	NUM_CALLS++;
	var nameData = ajax.responseXML.getElementsByTagName("baby")[0];
	var rank = nameData.getElementsByTagName("rank");
	// Loop over the number of ranking data to create the graph info
	for (var i = 0; i < rank.length; i++) {	
		var leftCalculation = 10 + 60 * i;
		var rankNum = rank[i].firstChild.nodeValue;
		var bar = document.createElement("div");
		bar.innerHTML = rankNum;
		bar.addClassName("ranking");
		// This code compares makes the second name's bars blue 
		if (NUM_CALLS > 1) {
			bar.style.backgroundColor = "blue";									
		}
		// If the name is in top 10, attatch popular class
		if (rankNum >= 1 && rankNum <= 10) {
			bar.addClassName("popular");
		}
		if (rankNum == 0) {
			bar.style.top = 250 + "px";
		} else {
			bar.style.top = (250 - Math.floor((1000 - rankNum) / 4)) + "px";
		}
		
		bar.style.display = "none";
		$("graph").appendChild(bar);
		bar.appear();														//Makes the bars fade in
		bar.style.left = (leftCalculation) + "px";
		
		var year = document.createElement("label");
		year.innerHTML = rank[i].getAttribute("year");
		year.style.left = (leftCalculation) + "px";
		$("graph").appendChild(year.addClassName("year"));
		year.pulsate();														//Makes the years pulsate
	}
}

//This function throws a descriptive error 
function ajaxFailure(ajax, exception) {
  $("errors").innerHTML = "There was an error!:" + 
        " The status of the server: " + ajax.status + " " + ajax.statusText + 
        "; The server has this to tell you: " + ajax.responseText;
}

