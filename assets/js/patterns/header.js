$(function() {
  $("#hmmt-menu-icon").click(function() {
    $("#hmm-bottom").addClass("hmm-open");
    $("#header-menu-mobile").addClass("relative");

    return false;
  });

  $("#hmmb-menu-icon-close").click(function() {
    $("#hmm-bottom").removeClass("hmm-open");
    $("#header-menu-mobile").removeClass("relative");

    return false;
  });

  $(".hmmbpt-dropbtn").click(function() {
    $(
      ".hmmb-principal > li > .hmmbp-title, .hmmb-principal > li > .hmmbp-submenu"
    ).removeClass("active");

    $(this)
      .parent()
      .toggleClass("active");
    $(this)
      .parent()
      .next()
      .toggleClass("active");
  });

  $("#hmmt-search").click(function() {
    $(this).toggleClass("active");
    $(this)
      .find("span")
      .toggleClass("icon-close");
    $(this)
      .find("span")
      .toggleClass("icon-search");
    $("#hmm-search-dropdown").toggleClass("active");

    var text = $(this)
      .children("p")
      .text();
    $(this)
      .children("p")
      .text(text == "Buscar" ? "Cerrar" : "Buscar");

    return false;
  });

  $("#hmmsdc-search, #hmdsdc-search").on("input", function() {
    var input = $(this);
    var submit = $("#" + input.attr("id").split("-")[0] + "-submit");

    if (submit) {
      if (input.val()) {
        submit.addClass("active");
      } else {
        submit.removeClass("active");
      }
    }

    return false;
  });

  $("#hmmb-profile, #hmmbpd-close").click(function() {
    $(".profile-btn").toggleClass("pb-active");
    $("#hmmb-profile-dropdown").toggleClass("active");
    $("#hmm-bottom > .hmmb-icons").toggleClass("active-profile");

    return false;
  });

  $(".hmmb-language > [data-lang], .hmdt-language > [data-lang]").click(
    function() {
      var lang = $(this).attr("data-lang");
      $(
        ".hmmb-language > [data-lang], .hmdt-language > [data-lang]"
      ).removeClass("active");

      $(
        ".hmmb-language > [data-lang=" +
          lang +
          "], .hmdt-language > [data-lang=" +
          lang +
          "]"
      ).addClass("active");

      return false;
    }
  );

  ///////

  $("#hmdt-profile").click(function() {
    $(".profile-btn").toggleClass("pb-active");
    $("#hmd-profile-dropdown").toggleClass("active");

    if ($("#hmdt-search").hasClass("active")) {
      $("#hmdt-search").toggleClass("active");
      $("#hmd-search-dropdown").toggleClass("active");
    }

    return false;
  });

  $("#hmdpdw-close").click(function() {
    $(".profile-btn").toggleClass("pb-active");
    $("#hmd-profile-dropdown").toggleClass("active");

    return false;
  });

  $("#hmdt-search").click(function() {
    $(this).toggleClass("active");
    $("#hmd-search-dropdown").toggleClass("active");

    if ($("#hmd-profile-dropdown").hasClass("active")) {
      $(".profile-btn").toggleClass("pb-active");
      $("#hmd-profile-dropdown").toggleClass("active");
    }

    return false;
  });

  $("#hmdsd-close").click(function() {
    $("#hmdt-search").toggleClass("active");
    $("#hmd-search-dropdown").toggleClass("active");

    return false;
  });

  /// subsctions
  $("#smf-btn").click(function() {
    $("#smf-btn").toggleClass("active");
    $("#smf-content")
      .children()
      .toggleClass("active");

    return false;
  });
});