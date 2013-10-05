$(document).ready(function() {
  $(".social").on("mouseenter", function() {
    $(this).animate(
    	{"margin-right":"4px"}
    	, "fast");
  });
  $(".social").on("mouseleave", function() {
    $(this).animate(
    	{"margin-right":"0px"}
    	, "fast");
  });
});
