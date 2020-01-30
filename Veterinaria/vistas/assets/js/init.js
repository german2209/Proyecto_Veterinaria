(function($){
  $(function(){

$('.button-collapse').sideNav();
$('.parallax').parallax();
$('.datepicker').datepicker();
   
$('.carousel.carousel-slider').carousel({fullWidth: true}); 
      setInterval(function() {
      $('.carousel').carousel('next');
      }, 100000);
      
$('ul.tabs').tabs();
$('.fixed-action-btn').floatingActionButton();
$('select').formSelect();


    

  }); // end of document ready
})(jQuery); // end of jQuery name space


