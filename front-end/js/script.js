var eventDate=Math.round(30*Math.random());
for(var i=1; i<=4; i++){
    document.write("<tr>");
    for(var j=1; j<=8; j++){
        var date=(i-1)*8+j;
        if(date==9 || date==23 || date==30){
            document.write("<td class='cellCalendar'>" + date + "<i class='fa fa-coffee'></i><p>Event</p>" + "</td>");
        }else{
        document.write("<td class='cellCalendar'>" + date + "</td>");
        }
    }
    document.write("</tr>");
}