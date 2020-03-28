
$(document).ready(function () {
        $("#viewArt").hide();

        //open art work
        $(".post").click(function () {

                $("#commentsPost").hide();


                //get attributr of like , dislike , fav 
                var like = $(this).find(".like").attr("src");
                var dislike = $(this).find(".dislike").attr("src");
                var fav = $(this).find(".favbutton").attr("src");

                $("#viewArt").find(".like").attr("src", like);
                $("#viewArt").find(".dislike").attr("src", dislike);
                $("#viewArt").find(".favbutton").attr("src", fav);

                // get art img
                var attr = $(this).attr('src');

                // For some browsers, `attr` is undefined; for others, `attr` is false. Check for both.
                if (typeof attr !== typeof undefined && attr !== false) {//بعض البيجز الصورة بنفس الهتمل فايل سو باخذ الصوره منه
                        attr = attr.replace('url(', '').replace(')', '').replace(/\"/gi, "");
                        $("#userPost").attr("src", attr);


                } else {
                        var bg = $(this).css("background-image");//للبيجز اللي الصوره موجودة بالسي اس اس فايل
                        bg = bg.replace('url(', '').replace(')', '').replace(/\"/gi, "");
                        $("#userPost").attr("src", bg);
                }

                
               //position of the view artwork  in ghe document
                var pos = $(this).css("padding");
                var width = $(this).outerWidth();

                $("#viewArt ").css("position", "absolute");
                $("#viewArt ").css("top", pos.top + "px");
                $("#viewArt ").css("left", 25 + "%");

                $("#commentsPost").css("position", "absolute");
                $("#commentsPost ").css("top", pos.top + "px");
                $("#commentsPost").css("left", 25 + "%");
                $("#bg-model").show();
                $("#viewArt").show();


        });
    
        //close button
        $(".close").click(function () {

                $("#viewArt").hide();
                $("#bg-model").hide();
                $("#commentsPost").hide();

        });

        //close the div when click any where out side the div
        $(document).mouseup(function (e) {

                var container = $("#viewArt");
                var container2 = $("#commentsPost");

                // if the target of the click isn't the container nor a descendant of the container
                if (!container.is(e.target) && container.has(e.target).length === 0 && container2.has(e.target).length === 0 && !container2.is(e.target)) {
                        if ($("#viewArt").is(":visible")) {
                                container.hide();
                                $("#bg-model").hide();
                                $("#commentsPost").hide();
                        }

                }

        });
        
        //fill buttons
        $(".like").click(function () {

                $(this).attr("src", "assets/Raqash Icon-filled like.png");
                $(this).siblings(".dislike").attr("src", "assets/Raqash Icon-dislike.svg");

        });

        $(".dislike").click(function () {
                $(this).attr("src", "assets/Raqash Icon-filled dislike.png");
                $(this).siblings(".like").attr("src", "assets/Raqash Icon-like.svg");
                // $("#like").attr("src" ,"assets/Raqash Icon-like.svg" );


        });

        $(".favbutton").click(function () {
                $(this).attr("src", "assets/Raqash Icon-favActivated.svg");

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

