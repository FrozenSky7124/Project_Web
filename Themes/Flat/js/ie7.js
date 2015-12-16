jQuery(document).ready(function($){

 jQuery(".header_menu > ul li li").hover(function(){
  jQuery(">ul:not(:animated)",this).slideDown("fast");
  },
  function(){
  jQuery(">ul",this).slideUp("fast");
 });

});