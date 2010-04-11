// this does the default-until-click-then-it-goes-away-but-comes-back-if-theres-nothing-on-blur bling 
$(document).ready(function() {
  $("input.defaulted").focus(function() {
    if (this.value == this.defaultValue) {
      this.value = '';
      $(this).addClass('active');
    }
    $(this).blur(function() {
      if (this.value == '') { 
         $(this).removeClass('active');
         this.value = this.defaultValue;
      }
    });
  });
});

// flash addon
$(document).ready(function() {
    $("div.flash").each(function() {
        $(this).append("<span class='xout'>[<a href='#'>hide</a>]</span>");
    });
    
    $(".xout").click(function() {
        $(this).parent().hide();
        return false;
    });
});
