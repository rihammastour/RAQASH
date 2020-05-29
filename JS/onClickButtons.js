
$(document).ready(function () {

        $(".dropContent").hide();

        $("#back").click(function(){
                $("#commentsPost").hide();
                // $("h3").hide();
                $("#viewArt").show();
              });        //fill buttons


        $(".like").click(function () {

                $(this).attr("src", "assets/Raqash Icon-filled like.png");
                $(this).siblings(".dislike").attr("src", "assets/Raqash Icon-dislike.svg");
                $.ajax({
                        type: "POST",
                        url:'like.php',
                        data:{artid: $(this).data("row_id"), likeAction : 'like'}
                   });
        });

        $(".dislike").click(function () {
                $(this).attr("src", "assets/Raqash Icon-filled dislike.png");
                $(this).siblings(".like").attr("src", "assets/Raqash Icon-like.svg");
                // $("#like").attr("src" ,"assets/Raqash Icon-like.svg" );
                $.ajax({
                        type: "POST",
                        url:'like.php',
                        data:{artid: $(this).data("row_id"), dislikeAction : 'dislike'}
                   });

        });

        $(".favbutton").click(function () {
                $(this).attr("src", "assets/Raqash Icon-favActivated.svg");
                $.ajax({
                        type: "POST",
                        url:'addToFav.php',
                        data:{artid: $(this).data('fav')}
                   });  
        });

        //in home pages disable the img info div so it does not show view art onclick
        $(".disable").click(function () {
                return false;
        });



});


$(document).ready(function () {
        $('[data-toggle="popover"]').popover();
});
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
        } else {
                mybutton.style.display = "none";
        }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}




window.addEventListener('load', function () {
        new Glider(document.querySelector('.artistsSlider'), {
                slidesToShow: 4,
                slideeToscroll: 4,
                draggable: true,
                dots: '.dots',


                arrows: {
                        prev: '.prev',
                        next: '.next'
                }
        });
});

function addfav(id){//add post to favourit
        $.ajax({
                  type: "POST",
                  url:'addToFav.php',
                  data:{artid: id}
             });  
        $(this).attr("src", "assets/Raqash Icon-favActivated.svg");
    
      }



function toggleAddRemove(id,img){
       var image = $("img").attr("src");
       if(image == 'assets/Raqash Icon-fav.svg'){
               addfav(id);
        $("img").attr("src",'assets/Raqash Icon-favActivated.svg');
        }else{
        delet(id);
        $("img").attr("src",'assets/Raqash Icon-fav.svg');

       }


}
