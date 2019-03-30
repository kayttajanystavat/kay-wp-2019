try{Typekit.load({ async: false });}catch(e){}

var menuBtn =  jQuery('.menu-button');

jQuery(document).ready(function() {
  jQuery( window ).resize(function() {
    if (jQuery(window).width() > 719) {
       jQuery('.mdc-menu').hide();
       menuBtn.text('Valikko');
    }
  });
});
function openMenu() {
  jQuery('.mdc-menu').fadeToggle( 0, function() {
    if (jQuery(this).is(':visible')) {
      menuBtn.text('Sulje');
    } else {
      menuBtn.text('Valikko');
    }
  });
}
