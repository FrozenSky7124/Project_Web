jQuery(function(){
  jQuery("a").bind("focus",function(){if(this.blur)this.blur();});
  jQuery('.rollover').rollover();
  jQuery("a.target_blank").attr("target","_blank");
  jQuery(".header_menu ul li:has(ul)").addClass("parent_menu");

  jQuery("#comment_area ol > li:even").addClass("even_comment");
  jQuery("#comment_area ol > li:odd").addClass("odd_comment");
  jQuery(".even_comment > .children > li").addClass("even_comment_children");
  jQuery(".odd_comment > .children > li").addClass("odd_comment_children");
  jQuery(".even_comment_children > .children > li").addClass("odd_comment_children");
  jQuery(".odd_comment_children > .children > li").addClass("even_comment_children");
  jQuery(".even_comment_children > .children > li").addClass("odd_comment_children");
  jQuery(".odd_comment_children > .children > li").addClass("even_comment_children");

  jQuery("#trackback_switch").click(function(){
    jQuery("#comment_switch").removeClass("comment_switch_active");
    jQuery(this).addClass("comment_switch_active");
    jQuery("#comment_area").animate({opacity: 'hide'}, 0);
    jQuery("#trackback_area").animate({opacity: 'show'}, 1000);
    return false;
  });

  jQuery("#comment_switch").click(function(){
    jQuery("#trackback_switch").removeClass("comment_switch_active");
    jQuery(this).addClass("comment_switch_active");
    jQuery("#trackback_area").animate({opacity: 'hide'}, 0);
    jQuery("#comment_area").animate({opacity: 'show'}, 1000);
    return false;
  });


 jQuery(".header_menu > ul li").hover(function(){
  jQuery(">ul:not(:animated)",this).slideDown("fast");
  },
  function(){
  jQuery(">ul",this).slideUp("fast");
 });

});

function changefc(color){
  document.getElementById("search_input").style.color=color;
};