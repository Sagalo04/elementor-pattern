$( function() {
  $("#date").datepicker();
  $("#date-filter").datepicker();
  $(".date-filter").click(function () {
    $("#date-filter").datepicker("show");
  });

  $("#search-module-input").on("input", function() {
    var input= $(this);
    var is_search= input.val();

    if (is_search) {
      $("#search-module-submit").addClass("active");
    } else {
      $("#search-module-submit").removeClass("active");
    }

    return false;
  });

  $('input:not([type=search])').on("change", function() {
    checkInputState(this);
  });

  // Add or remove not-empty-input class to inputs depending on their contents. also call updateInputParent()
  function checkInputState(element) {
    var input = $(element).first();
    var parent = input.parent();

    if (input.val().length > 0) {
      input.addClass("not-empty-input");
    } else {
      input.removeClass("not-empty-input");
    }
    updateInputParent(parent, input);
  }

  // Show or hide visual feedback(i.e. icons, labels) checking the validity of the input
  function updateInputParent(parent, input) {
    if (parent && input.length === 1) {
      var isValidInput = input[0].validity.valid;

      if (isValidInput) {
        if (parent.hasClass("input-alert")) {
          parent.removeClass("input-alert");
        }

        if (!parent.hasClass("input-check")) {
          parent.addClass("input-check");
        }
      } else {
        if (parent.hasClass("input-check")) {
          parent.removeClass("input-check");
        }

        if (!parent.hasClass("input-alert") && input.val().length > 0) {
          parent.addClass("input-alert");
        } else if (input.val().length === 0) {
          parent.removeClass("input-alert");
        }
      }
    }
  }
});