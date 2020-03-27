
$(document).ready(function () {
         $("#viewArt").hide();


         $(".post").click(function () {
                $("#commentsPost").hide();

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



                var like = $(this).find(".like").attr("src");
                var dislike = $(this).find(".dislike").attr("src");
                var fav = $(this).find(".favbutton").attr("src");

                if (like == "assets/Raqash Icon-filled like.png") {
                        $("#viewArt").find(".like").attr("src", "assets/Raqash Icon-filled like.png");
                }
                if(dislike == "assets/Raqash Icon-filled dislike.png"){
                        $("#viewArt").find(".dislike").attr("src", "assets/Raqash Icon-filled dislike.png");
                }
                if(fav == "assets/Raqash Icon-favActivated.svg"){
                        $("#viewArt").find("#favbutton").attr("src", "assets/Raqash Icon-favActivated.svg");
                }

                var pos = $(this).css("padding");
                var width = $(this).outerWidth();



                $("#viewArt ").css("position", "absolute");
                $("#viewArt ").css("top", pos + "px");
                $("#viewArt ").css("left", 25 + "%");

                $("#commentsPost").css("position", "absolute");
                $("#commentsPost ").css("top", pos.top + "px");
                $("#commentsPost").css("left", 25 + "%");
                $("#bg-model").show();
                $("#viewArt").show();


        });

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
                if (!container.is(e.target) && container.has(e.target).length === 0 && container2.has(e.target).length === 0) {
                        container.hide();
                        $("#bg-model").hide();
                        $("#commentsPost").hide();
                }

        });

        $(".like").click(function () {
                $(this).attr("src", "assets/Raqash Icon-filled like.png");
                $(this).siblings(".dislike").attr("src", "assets/Raqash Icon-dislike.svg");

                // $(".dislike").attr("src","assets/Raqash Icon-dislike.svg")


        });

        $(".dislike").click(function () {
                $(this).attr("src", "assets/Raqash Icon-filled dislike.png");
                $(this).siblings(".like").attr("src", "assets/Raqash Icon-like.svg");
                // $("#like").attr("src" ,"assets/Raqash Icon-like.svg" );


        });

        $(".favbutton").click(function(){
                $(this).attr("src" ,"assets/Raqash Icon-favActivated.svg" );
        
        });

        $(".disable").click(function () {
                return false;
        });



});

