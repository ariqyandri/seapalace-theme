(function ($) {
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 150) {
      $(".navigation-wrapper").addClass("scroll");
    } else {
      $(".navigation-wrapper").removeClass("scroll");
    }
  });
  // SCROLL TO TOP
  $(window).scroll(function () {
    if ($(this).scrollTop() >= 50) {
      $(".totop").addClass("activetop");
    } else {
      $(".totop").removeClass("activetop");
    }
  });
  //

  // ===== Scroll to Top ====
  $("#totop").click(function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      500
    );
  });
  // ----//

  // LOADING SCREEN

  $(window).load(function () {
    $("#loading").fadeOut(1000);
  });
  // -----//

  // menu js
  $("#mobile-trigger").click(function () {
    $(".burger").toggleClass("active");
    $(".mobile-menu").toggleClass("active");
    $(".mobile-opacity").toggleClass("active");
    $("body").toggleClass("active");
    return false;
  });
  //

  // Load posts via AJAX

  // NEWSLETTER

  //  // Get the modal
  // var modal = document.getElementById("modaltest");

  // // Get the <span> element that closes the modal
  // var span = document.getElementsByClassName("close")[0];

  // $( ".item-trigger" ).click(function() {
  //   $( ".modal" ).fadeIn( "slow", function() {
  //     // Animation complete
  //   });
  // });

  // // When the user clicks on <span> (x), close the modal
  // span.onclick = function() {
  //   $('.modal').fadeOut();
  // }

  // // When the user clicks anywhere outside of the modal, close it
  // window.onclick = function(event) {
  //   if (event.target == modal) {
  //     $('.modal').fadeOut();
  //   }
  // }
  // //   //

  var close_qv = function () {
    $("#yith-quick-view-modal").removeClass("open").removeClass("loading");
    setTimeout(function () {
      $("#yith-quick-view-content").html("");
    }, 200);
  };

  function runAfterElementExists(jquery_selector, callback) {
    var checker = window.setInterval(function () {
      if ($(jquery_selector).length) {
        clearInterval(checker);
        callback();
      }
    }, 250);
  }

  setInterval(() => {
    runAfterElementExists(
      "#yith-quick-view-modal .added_to_cart.wc-forward",
      function () {
        close_qv();
      }
    );
  }, 200);

  //
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on the button, open the modal
  btn.onclick = function () {
    modal.style.display = "block";
  };

  // When the user clicks on <span> (x), close the modal
  span.onclick = function () {
    modal.style.display = "none";
  };

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
  //
})(jQuery);
