(function ($) {

  /* ================= Configure functions  =================  */
  // Open external links in the new window.
  function external_links() {
    $('a[rel*=external], .tribe-events-gcal').attr({'target': '_blank'});
  }

  // WooCommerce quantity buttons handler.
  function quanity_buttons() {
    $('.minus').on('click', function () {
      var quantity = $(this).next().val();
      //console.info(quantity);
      if (quantity > 0) {
        $(this).next().prop('value', --quantity);
      }
      // Quantity can`t be less than 1.
      if (quantity == 0) {
        this.disabled = true;
      }
    });
    $('.plus').on('click', function () {
      var quantity = $(this).prev().val();
      $(this).siblings('.minus').removeAttr('disabled').next().prop('value', ++quantity);
    });
  }

  // Center block via fixed or absolute positioning.
  function center_block(block) {
    var block = $(block);
    var block_left_margin = block.outerWidth() / 2;
    block.css({
      'marginLeft': -block_left_margin
    })
  }


  $(document).ready(function () {

    center_block('#message');

    /* Custom scripts */
    external_links();

    /* Initialize external plugins */

    /* Sticky elements on page scroll. */
    // Primary menu.
    $('.not-home #menu_mobile').pin({
      minWidth: 768, // disable for mobile.
      padding: {top: 10}
    });

    quanity_buttons();

    // Event page -> show message once event has been added to the cart,
    $('.add-to-cart').on('click', function () {
      $('#message').show(300);
    });

    // Failed to make this work.
    /*$('.site').jscroll({
     padding:200
     });*/

    // NextGen gallery images.
    // Lazy load
    $('.ngg-galleryoverview img').lazyload({
      effect: "fadeIn"
    });

    // Scroll to the tickets section on the calendar event single page.
    $(".book-tickets").on('click', function () {
      $('html, body').animate({
        scrollTop: $("form.cart").offset().top
      }, 800);
    });

    /* Device dependent scripts */
    // Mobile call
    if ($(window).width() < 768) {
      // Mobile menu.
      $('#menu_mobile').mmenu();
      $('.mm-panel li').on('click', function () {
        $(this).addClass('act');
      });

      // Move shopping cart block to the footer.
      $('.view-cart').appendTo('.sidebar-left');
    }
    // Not mobile
    else {
      // Call popup.
      $('.ngg-galleryoverview a').fancybox();

      // Shop gallery.
      $('ul.products > li.product > a:first-child').find('img').wrap('<strong></strong>').parents('a').attr('data-fancybox-group', 'gallery').fancybox();

      // Single event gallery.
      $('.image-gallery a').fancybox();
    }


  });

  $(window).resize(function () {

  });


})(jQuery);