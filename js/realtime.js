/**
 * 
 *  This, this is some bodged together shit.. 
 *  One request for every pice of information is bad.
 *  This should not be allowed. Use another method. JSON maybe?
 * 
 *  PR's are welcome :D
 *  
 */

var notSupported = false;


// CPU Usage
if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("server-sent/cpu.php");
    source.onmessage = function(event) {
        $('#easypiechart-blue').data('easyPieChart').update(event.data);
        $('span', $('#easypiechart-blue')).text(parseFloat(event.data).toFixed(1) + "%");
    };
} else {
    notSupported = true;
}

// CPU Temp
if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("server-sent/cpu_temp.php");
    source.onmessage = function(event) {
        document.getElementById("cpu_temp").innerHTML = event.data + "°C";
    };
} else {
    notSupported = true;
}

var ram_tot;
// Total RAM
if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("server-sent/ram_tot.php");
    source.onmessage = function(event) {
        ram_tot = event.data / 1000000;
        document.getElementById("ram_tot").innerHTML = parseFloat(ram_tot).toFixed(2) + " GB";
    };
} else {
    notSupported = true;
}

// Free RAM
if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("server-sent/ram_free.php");
    source.onmessage = function(event) {
        
        var ram_free = event.data / 1000000;
        var ram_used = (ram_tot - ram_free);
        var ram_pr = parseFloat((ram_used / ram_tot) * 100).toFixed(1)

        document.getElementById("ram_used").innerHTML = parseFloat(ram_used).toFixed(2);
        
        $('#easypiechart-orange').data('easyPieChart').update(ram_pr);
        $('span', $('#easypiechart-orange')).text(ram_pr + "%");
    };
} else {
    notSupported = true;
}
















// TODO: Add modal.
if(notSupported == true) {
    console.log("Your browser is not supported. Try with Chrome or FireFox instead.")
}