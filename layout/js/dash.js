$("document").ready(function () {
    $(".menu_left").click(function(){
        $('.ui.sidebar')
      .sidebar('toggle')
    ;
    })

    $(".filters li").click(function () {
      $(this).addClass("active").siblings().removeClass("active");
  });  
  var mixer = mixitup('.page_content');
  
$('.ui.dropdown').dropdown()

  })
