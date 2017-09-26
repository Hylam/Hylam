function clock(){
    
    now = new Date();
    var hours = now.getHours();
    var min = now.getMinutes();
    var sec = now.getSeconds();
    
    if (hours < 10) hours = "0" + hours;
    if (min < 10) min = "0" + min;
    if (sec < 10) sec = "0" + sec;
    
    document.getElementById('clock').innerHTML = hours + ":" + min + ":" + sec;
        
    setTimeout("clock()", 1000);
}

function calendar(){
    now =new Date;
    var year = now.getFullYear();
    var month = now.getUTCMonth() + 1;
    var day = now.getUTCDate();
    
    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;
    
    document.getElementById('calendar').innerHTML = year + "-" + month + "-" + day;
        
    setTimeout("calendar()", 1000);
}

