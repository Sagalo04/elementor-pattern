$(function() {
  $("#contact-mobile").click(function(){
    $('#hmm-bottom').addClass('hmm-open');
    $('#header-menu-mobile').addClass('relative');

    $('#hmm-bottom').animate({
      scrollTop: $('#hmm-bottom').offset().top
    });
  });
});