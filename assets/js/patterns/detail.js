$(function() {
  var detailContentHeight, requestAnimationFrame, ticking, detailContentDistanceFromTop, detailContent,
    latestKnownScrollY, scrollIndicator, contentScrolled;

  ticking = false;
  requestAnimationFrame = window.requestAnimationFrame
    || window.mozRequestAnimationFrame
    || window.webkitRequestAnimationFrame
    || window.msRequestAnimationFrame;

  window.requestAnimationFrame = requestAnimationFrame;

  $(window).load(function() {
    detailContent = $('.detail-content').first();
    if (detailContent.length > 0) {
      detailContentDistanceFromTop = detailContent.offset().top;
      detailContentHeight = detailContent.height();
      scrollIndicator = $('.scroll-indicator');
    }
  });

  function updateScrollIndicator() {
    ticking = false;

    if (scrollIndicator) {
      scrollIndicator.each(function() {
        if (latestKnownScrollY > detailContentDistanceFromTop) {
          contentScrolled = latestKnownScrollY - detailContentDistanceFromTop;
          $(this).width(((contentScrolled * 100) / detailContentHeight) + '%');
        } else {
          $(this).width('0');
        }
      });
    }
  }

  function requestTick() {
    if(!ticking) {
      requestAnimationFrame(updateScrollIndicator);
    }

    ticking = true;
  }

  $(window).scroll(function() {
    latestKnownScrollY = window.scrollY;
    requestTick();
  });
});