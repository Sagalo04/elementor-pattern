$(function() {
  var CHEAD = {
      "#header-menu-desktop": {
        if: {
          top: 0
        },
        else: {
          top: "-56px"
        }
      },
      "#hmdt-profile": {
        if: {
          top: 0
        },
        else: {
          top: "-15px"
        }
      },
      "#hmd-bottom": {
        class: "scroll",
        if: "removeClass",
        else: "addClass"
      }
    },
    prevScrollpos = window.pageYOffset,
    maxNumber = 100,
    ticking = false,
    detailContentHeight,
    detailContentDistanceFromTop,
    latestKnownScrollY,
    scrollIndicator;

  function updateScrollIndicator() {
    var currentScrollPos = window.pageYOffset;

    if (scrollIndicator && scrollIndicator.length) {
      if (latestKnownScrollY > detailContentDistanceFromTop) {
        scrollIndicator.width(
          parseInt(
            (((latestKnownScrollY - detailContentDistanceFromTop) * maxNumber) /
              detailContentHeight) *
              maxNumber
          ) /
            maxNumber +
            "%"
        );
      } else {
        scrollIndicator.width("0");
      }
    }

    for (var i in CHEAD) {
      if (CHEAD[i].element) {
        if (prevScrollpos >= currentScrollPos || currentScrollPos <= 0 ) {
          if (CHEAD[i].class) {
            CHEAD[i].element[CHEAD[i].if](CHEAD[i].class);
          } else {
            CHEAD[i].element.css(CHEAD[i].if);
          }
        } else {
          if (CHEAD[i].class) {
            CHEAD[i].element[CHEAD[i].else](CHEAD[i].class);
          } else {
            CHEAD[i].element.css(CHEAD[i].else);
          }
        }
      }
    }

    prevScrollpos = currentScrollPos <= 0 ? 0 : currentScrollPos;
    setTimeout(function () {
      ticking = false;
    }, 390);
  }

  $(window).load(function() {
    var detailContent = $(".detail-content").first();
    if (detailContent.length > 0) {
      detailContentDistanceFromTop = detailContent.offset().top;
      detailContentHeight = detailContent.height();
      scrollIndicator = $(".scroll-indicator");
    }

    for (var i in CHEAD) {
      CHEAD[i].element = $(i);
      if (!CHEAD[i].element) {
        CHEAD = {};
        break;
      }
    }
  });

  $(window).scroll(function() {
    latestKnownScrollY = window.scrollY;
    if (!ticking) {
      (window.requestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.msRequestAnimationFrame)(updateScrollIndicator);
    }

    ticking = true;
  });
});