$(document).ready(function() {
  $("img").on("mouseenter", function() {
    $(this).animate(
    	{"margin-right":"4px"}
    	, "fast");
  });
  $("img").on("mouseleave", function() {
    $(this).animate(
    	{"margin-right":"0px"}
    	, "fast");
  });
});
