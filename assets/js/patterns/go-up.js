$(function() {
  window.scrollAnimate = function(to, duration) {
    var start = window.scrollY,
      change = to - start,
      currentTime = 0,
      increment = 20;
    var animateScroll = function() {
      currentTime += increment;
      var val = Math.easeInOutQuad(currentTime, start, change, duration);
      window.scrollTo(0, val);
      if (currentTime < duration) {
        setTimeout(animateScroll, increment);
      }
    };

    animateScroll();
  };

  Math.easeInOutQuad = function(t, b, c, d) {
    t /= d / 2;
    if (t < 1) return (c / 2) * t * t + b;
    t--;
    return (-c / 2) * (t * (t - 2) - 1) + b;
  };

  $(".go-up[role='button']").click(function() {
    if (
      navigator &&
      navigator.userAgent &&
      navigator.userAgent.match &&
      navigator.userAgent.match(
        /iPad|iPhone|iPod|Android|Windows Phone|AppleWebKit/i
      )
    ) {
      window.scrollAnimate(0, 1000);
    } else {
      $("html, body").animate(
        {
          scrollTop: 0
        },
        1000
      );
    }
  });

  $('.subsections-scroll a[href^="#"]').click(function(event) {
    var scollTop = parseInt($($.attr(this, "href")).offset().top);
    if (
      navigator &&
      navigator.userAgent &&
      navigator.userAgent.match &&
      navigator.userAgent.match(
        /iPad|iPhone|iPod|Android|Windows Phone|AppleWebKit/i
      )
    ) {
      event.preventDefault();
      window.scrollAnimate(scollTop, 1000);
    }
  });
});