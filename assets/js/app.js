/*
 * Author: Refyandra
 * Date: 1 Jan 2016
 * Description:
 *      This is a app file used only for the teknisi view (index.php) assets/js
 **/


$(function () {

  "use strict";

//SLIMSCROLL FOR CHAT WIDGET
  $('#chat-box').slimScroll({
    height: '250px'
  });

  
  //Make the dashboard widgets sortable Using jquery UI
  $(".connectedSortable").sortable({
    placeholder: "sort-highlight",
    connectWith: ".connectedSortable",
    handle: ".box-header, .nav-tabs",
    forcePlaceholderSize: true,
    zIndex: 999999
  });
  $(".connectedSortable .box-header, .connectedSortable .nav-tabs-custom").css("cursor", "move");

  //jQuery UI sortable for the todo list
  $(".todo-list").sortable({
    placeholder: "sort-highlight",
    handle: ".handle",
    forcePlaceholderSize: true,
    zIndex: 999999
  });
  


});
