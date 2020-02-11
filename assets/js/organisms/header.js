$( function() {
  $('#hmmt-menu-icon').click(function() {
    $('#hmm-bottom').addClass('hmm-open');
    $('#header-menu-mobile').addClass('relative');

    return false;
  });

  $('#hmmb-menu-icon-close').click(function() {
    $('#hmm-bottom').removeClass('hmm-open');
    $('#header-menu-mobile').removeClass('relative');

    return false;
  });

  $(".hmmbpt-dropbtn").on('click', function() {
    $(this).parent().toggleClass('active');
    $(this).parent().next().toggleClass('active');
  });

  $('#hmmt-search').click(function() {
    $(this).toggleClass('active');
    $(this).find("span").toggleClass('icon-close');
    $(this).find("span").toggleClass('icon-search');
    $('#hmm-search-dropdown').toggleClass('active');

    var text= $(this).children("p").text();
    $(this).children("p").text(
        text == "Buscar" ? "Cerrar" : "Buscar");

    return false;
  });

  $('#hmmb-profile').click(function() {
    $('.profile-btn').toggleClass('pb-active');
    $('#hmmb-profile-dropdown').toggleClass('active');

    if( !$('#hmmb-profile-dropdown').hasClass('active') ) {
      $('.hmmb-principal').toggleClass('none');
      $('.hmmb-language').toggleClass('none');
      $('.hmmb-footer').toggleClass('none');
    } else {
      setTimeout(function() {
        $('.hmmb-principal').toggleClass('none');
        $('.hmmb-language').toggleClass('none');
        $('.hmmb-footer').toggleClass('none');
      }, 400);
    }


    return false;
  });

  $('#hmmbpd-close').click(function() {
    $('.profile-btn').toggleClass('pb-active');
    $('#hmmb-profile-dropdown').toggleClass('active');

    $('.hmmb-principal').toggleClass('none');
    $('.hmmb-language').toggleClass('none');
    $('.hmmb-footer').toggleClass('none');

    return false;
  });

  $('#hmmb-es').click(function() {
    if( !$(this).hasClass('active') ) {
      $(this).addClass("active");
      $('#hmmb-en').removeClass("active");
    }

    return false;
  });

  $('#hmmb-en').click(function() {
    if( !$(this).hasClass('active') ) {
      $(this).addClass("active");
      $('#hmmb-es').removeClass("active");
    }

    return false;
  });

  ///////

  $('#hmdt-profile').click(function() {
    $('.profile-btn').toggleClass('pb-active');
    $('#hmd-profile-dropdown').toggleClass('active');

    if( $('#hmdt-search').hasClass('active') ) {
      $('#hmdt-search').toggleClass('active');
      $('#hmd-search-dropdown').toggleClass('active');
    }

    return false;
  });

  $('#hmdpdw-close').click(function() {
    $('.profile-btn').toggleClass('pb-active');
    $('#hmd-profile-dropdown').toggleClass('active');

    return false;
  });

  $('#hmdt-search').click(function() {
    $(this).toggleClass('active');
    $('#hmd-search-dropdown').toggleClass('active');

    if( $('#hmd-profile-dropdown').hasClass('active') ) {
      $('.profile-btn').toggleClass('pb-active');
      $('#hmd-profile-dropdown').toggleClass('active');
    }

    return false;
  });

  $('#hmdsd-close').click(function() {
    $('#hmdt-search').toggleClass('active');
    $('#hmd-search-dropdown').toggleClass('active');

    return false;
  });

  $('#hmdsdc-search').on('input', function() {
    var input= $(this);
    var is_search= input.val();
    if(is_search){
      $('#hmdsdc-submit').addClass("active");
    } else {
      $('#hmdsdc-submit').removeClass("active");
    }

    return false;
  });

  $('#hmdtl-es').click(function() {
    if( !$(this).parent().hasClass('active') ) {
      $(this).parent().addClass("active");
      $('#hmdtl-en').parent().removeClass("active");
    }

    return false;
  });

  $('#hmdtl-en').click(function() {
    if( !$(this).parent().hasClass('active') ) {
      $(this).parent().addClass("active");
      $('#hmdtl-es').parent().removeClass("active");
    }

    return false;
  });
});

var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("header-menu-desktop").style.top = "0";
    document.getElementById("hmdt-profile").style.marginTop = "0";
    document.getElementById("hmd-bottom").classList.remove("scroll");
  } else {
    document.getElementById("header-menu-desktop").style.top = "-56px";
    document.getElementById("hmdt-profile").style.marginTop = "-15px";
    document.getElementById("hmd-bottom").classList.add("scroll");
  }
  prevScrollpos = currentScrollPos;
}