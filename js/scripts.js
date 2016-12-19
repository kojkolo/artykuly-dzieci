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

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
});

$(".link").click(function (event) {
     var url = $(this).attr('href');
    $.get( "ajax"+url, function( data ) {
      $( "#categoryContent" ).html( data );
    });
    event.preventDefault();
     event.stopPropagation();
});

});