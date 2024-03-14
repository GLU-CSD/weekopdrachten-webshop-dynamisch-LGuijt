$(document).ready(function(){
    $(".s").click(function(){
      const src = $(this).attr("src");
      $("#bigpic").attr("src", src);
    })
  });