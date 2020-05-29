// function start(){

//     var currentDate = new Date();
//     document.getElementById("imagedate").innerHTML=innerHTMl+currentDate.getDate()+"-"+currentDate.getMonth()+"-"+currentDate.getFullYear();
 
// }

function viewArt(clicked ){
    if(clicked=="artView"){
    document.getElementById("viewArt").style.display="block";
    document.getElementById("commentsPost").style.display="none";
    

    

    }else if(clicked == "commentsView"){
        document.getElementById("viewArt").style.display="none";
        document.getElementById("commentsPost").style.display="block";



    }
}

window.addEventListener("load",start,false);