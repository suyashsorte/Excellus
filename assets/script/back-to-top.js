
// when scroll 100px down, show the back-to-up button
$(window).scroll(function(){
    if($(window).scrollTop() > 100){
        $("#backToTop").addClass('show');
    }else{
        $("#backToTop").removeClass('show');
    }
});

// scroll back animation when the button is clicked
$("#backToTop").on("click", function(){
    $("html, body").animate({scrollTop:0}, '300');
});