

// function dropdwn(e){
//     document.alert(" was clicked.");
// if( e.target.innerhtml=='∨')
// document.alert("Button was clicked.");

// }



$(document).ready(function(){


    $(document).on('click','.btn',function(){
     
        var text = $(this).text();

        if (text == '∨')
        $(this).html('&wedge;') ;  
    else 
        $(this).html('&vee;');
        $('.artistInfo').collapse("toggle")
        // $(".d-none").toggleClass("d-block");


 //$("#artistInfo").toggleClass("d-none");
//     $(".d-none").removeClass('d-none');
//  $("#myId").addClass('d-none');
// : $("#myId").toggleClass(

    });


 
    

});

