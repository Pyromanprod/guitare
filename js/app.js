$(function () {

    let miniature = $("body main div.content-config article img");
    //postion overlay pour click
    let positionTopOverlay = 0;
    $("#input-email").hide();


    // POSITION DU SCROLL POUR DONNEE TOP A L'OVERLAY
    $(window).scroll(function () {
        positionTopOverlay = $(window).scrollTop();
    });

    //OVERTURE OVERLAY
    miniature.click(function (e) {
        $("body").append("<div class='overlay'></div>");
        let overlay = $(".overlay");

        overlay.css("top", positionTopOverlay);
        overlay.append("<img src='" + $(this).data('img') + "' alt=''></img>");
        overlay.show();
        // bloque le scroll sur overlay
        overlay.on('mousewheel DOMMouseScroll', function (e) {
            var e0 = e.originalEvent,
                delta = e0.wheelDelta || -e0.detail;

            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
        });

        overlay.click(function (e) {
            overlay.remove();

        });
    });

    //VERIF FORM FRONT
    $("#form-newletter").submit(function (e) {
        e.preventDefault();
        if ($("#mail").val().length >= 10) {
            $("#mail").hide();
            $("#button-submit").hide();
            $("#emailHelp").removeClass("text-danger bg-rouge");
            $("#emailHelp").addClass("text-success bg-vert");
            $("#emailHelp").text("Vous avez bien été inscrit à la newletter");
        } else {
            $("#input-email").show();
            $("#emailHelp").addClass("text-danger bg-rouge");
            $("#emailHelp").text("Entrez au moins 10 caractère");
        }
    });

    $("#mail").focus(function (e) {
        $("#input-email").hide();


    });

});