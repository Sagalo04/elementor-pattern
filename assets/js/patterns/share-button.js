$( function() {
  $('.share-container > a.share-button').on('click', function() {
    event.preventDefault();
    $(this).parent().toggleClass('active');
    var icon = $('.share-button').find('.icon');
    icon.toggleClass('icon-share-alt');
    icon.toggleClass('icon-close');
  });
});