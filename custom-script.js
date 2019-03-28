try{Typekit.load({ async: false });}catch(e){}

var menuBtn = $('.menu-button');

$(document).ready(function() {
  $( window ).resize(function() {
    if ($(window).width() > 719) {
       $('.mdc-menu').hide();
       menuBtn.text('Valikko');
    }
  });
});
function openMenu() {
  $('.mdc-menu').fadeToggle( 150, function() {
    if ($(this).is(':visible')) {
      menuBtn.text('Sulje');
    } else {
      menuBtn.text('Valikko');
    }
  });
}
