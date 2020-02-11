$( function() {
  $('.accordion > .a-btn').click(function() {
    $(this).toggleClass('active');
    $(this).siblings('div').toggleClass('active');

    return false;
  });
});