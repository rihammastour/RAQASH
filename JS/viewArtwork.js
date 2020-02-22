function start(){

    var currentDate = new Date();
    document.getElementById("date").innerHTML=currentDate.getDate()+"-"+currentDate.getMonth()+"-"+currentDate.getFullYear();
}
window.addEventListener("load",start,false);