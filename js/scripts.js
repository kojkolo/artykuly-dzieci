$( document ).ready(function() {
$(".quantity").hover(
    function() {
       $(this).children("p").toggle();
       $(this).children(".quantityform").show();
    },
    function(){
       $(this).children("p").toggle();
       $(this).children(".quantityform").hide();
    }
);
});