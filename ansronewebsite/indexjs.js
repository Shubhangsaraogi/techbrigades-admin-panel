 var ev = new Date();
 var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
 var datestring = ev.toLocaleDateString(undefined, options);
 window.onload = function(){
 document.getElementById("date").value = datestring;
 }
 