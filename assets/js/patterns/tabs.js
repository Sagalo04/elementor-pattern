$(function() {
  $(".tab[data-box-class][data-tab-class][data-box-id]").click(function() {
    var boxClass = this.getAttribute("data-box-class"),
      tabClass = this.getAttribute("data-tab-class"),
      boxId = this.getAttribute("data-box-id");
    $("." + tabClass).removeClass("active");
    $("." + boxClass).removeClass("active");
    $("#" + boxId).addClass("active");
    $(this).addClass("active");
  });
});