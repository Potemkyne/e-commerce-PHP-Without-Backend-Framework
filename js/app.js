/*--------------------------------------------------------------*/
/* TEST */
/*--------------------------------------------------------------*/
$('.sup').click(
        function () {
            "use strict";
            $('body').css("background-color", "orchid");
        }
);

/*--------------------------------------------------------------*/
/* Chams Invisibles  */
/*--------------------------------------------------------------*/
$(function () {
    "use strict";
    $('.invisible').hide();
    $('#quantite-panier').hide();
});

/*--------------------------------------------------------------*/
/* Supression ligne panier */
/*--------------------------------------------------------------*/
$('.supp').click(function (e) {
    e.preventDefault(e);
    $.ajax({
        url: "./DeleteCardLine.php",
        method: "get",
        data: {id: $(this).parent().siblings(":first").text()},
        dataType: 'json',
        success: function (res, stat, autre) {
            console.log(res);
        },
        complete: function (res, stat) {
            console.log(res);
            console.log(stat);
        },
        error: function (res, stat, err) {
            console.log(res);
            console.log(stat);
            console.log(err);
        }
    });
    
}
);

/*--------------------------------------------------------------*/
/*  Modification quantité de ligne panier */
/*--------------------------------------------------------------*/
$('.update').click(
        function () {
            "use strict";
            $('#form').append('<form class="form-inline my-2 my-lg-0" method="post" action="#"><input class="form-control form-control-sm" type="number" value="10" name="qte_modifie"> <button id="bouton" class="btn btn-warning my-2 my-sm-0" type="submit" value="recalculer">Je modifie</button></form>');
        }
);
$('#bouton').click(function (e) {
    e.preventDefault(e);
    $.ajax({
        url: "./update.php",
        method: "get",
        data: {id: $(this).parent().siblings(":first").text()},
        dataType: 'json',
        success: function (res, stat, autre) {
            console.log(res);
            alert('yes');
        },
        complete: function (res, stat) {
            console.log(res);
            console.log(stat);
        },
        error: function (res, stat, err) {
            console.log(res);
            console.log(stat);
            console.log(err);
        }
    });
    function retour(data){
        alert(data);
    }
}
);

/*--------------------------------------------------------------*/
/* ZOOM elevateweb.co.uk/image-zoom */
/*--------------------------------------------------------------*/
$("#zoom_08").elevateZoom({
    zoomWindowFadeIn: 500,
    zoomWindowFadeOut: 500,
    lensFadeIn: 500,
    lensFadeOut: 500
});
/*--------------------------------------------------------------*/
/* PAYPAL Express Checkout */
/*--------------------------------------------------------------*/
paypal.Button.render({
    env: 'production', // Or 'sandbox',

    commit: true, // Show a 'Pay Now' button

    payment: function () {
        // Set up the payment here
    },
    onAuthorize: function (data, actions) {
        // Execute the payment here
    }

}, '#paypal-button');
