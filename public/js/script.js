$(document).ready(function() {
    "use strict";
    
    // mi__init_asideDropdown()

    mi__init_startDateOnly();
    mi__init_endDateOnly();
    mi__init_dataTable();
    mi__init_dataTableFixedColumn();
    mi__init__dropify();

    $('.btn-mobile_toggler').on('click', function() {
      $(this).closest('.dashboard').toggleClass('aside-menu_unfold').toggleClass('aside-menu_fold');
    });

    

    $(window).on("resize", function () {
      mi__init__asideToggle();
    }).resize()

});

function mi__init__asideToggle() {
  var $bodyClas = $('.dashboard');
  var $ww = $(window).width();

  if ($ww <= 767) {     
    if($bodyClas.hasClass('aside-menu_unfold')) {
      $bodyClas.removeClass('aside-menu_unfold').addClass('aside-menu_fold');
    }
  }else {
    $bodyClas.removeClass('aside-menu_fold').addClass('aside-menu_unfold');
  }
}

function mi__init_asideDropdown() {
  jQuery('.nav-dropdown-menu').slideUp();
  jQuery(".a-nav-toggle").on('click', function (event) {
    event.preventDefault();
    $(this)
    .closest('.nav-dropdown')
    .toggleClass('open')
    .find('.nav-dropdown-menu')
    .slideToggle()   
  });
}


function mi__init_dataTable() {
  if($(".init-datatable").length) {
    $('.init-datatable').DataTable({
      responsive: true,
      "scrollX": true,
      aoColumnDefs: [
        {
          bSortable: false,
          aTargets: [ -1 ]
        }
      ],
      scrollCollapse: true
    });
  }
}
function mi__init_dataTableFixedColumn() {
  if($(".init-datatable-fixed-column").length) {
    $('.init-datatable-fixed-column').DataTable({
      responsive: true,
      "scrollX": true,
      aoColumnDefs: [
        {
          bSortable: false,
          aTargets: [ -1 ]
        }
      ],
      scrollCollapse: true,
      fixedColumns:   {
        leftColumns: 1,
        rightColumns: 1
      }
    });
  }
}

function mi__init__dropify() {
  if($(".dropify").length) {
    $('.dropify').dropify();
  }
}

function mi__init_startDateOnly() {
  if($("#startDateOnly").length) {
    $("#startDateOnly").datetimepicker({
      format: 'L'
    });
  }
}
function mi__init_endDateOnly() {
  if($("#endDateOnly").length) {
    $("#endDateOnly").datetimepicker({
      format: 'L'
    });
  }
}





var body = $('body');
var contentWrapper = $('.content-wrapper');
var scroller = $('.container-scroller');
var footer = $('.footer');
var sidebar = $('.aside-nav');

//Add active class to nav-link based on url dynamically
//Active class can be hard coded directly in html file also as required

function addActiveClass(element) {
  if (current === "") {
    //for root url
    if (element.attr('href').indexOf("index.html") !== -1) {
      element.parents('.nav-item').last().addClass('active');
      if (element.parents('.sub-menu').length) {
        element.closest('.collapse').addClass('show');
        element.addClass('active');
      }
    }
  } else {
    //for other url
    if (element.attr('href').indexOf(current) !== -1) {
      element.parents('.nav-item').last().addClass('active');
      if (element.parents('.sub-menu').length) {
        element.closest('.collapse').addClass('show');
        element.addClass('active');
      }
      if (element.parents('.submenu-item').length) {
        element.addClass('active');
      }
    }
  }
}

var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
$('.nav li a', sidebar).each(function() {
  var $this = $(this);
  addActiveClass($this);
})

$('.horizontal-menu .nav li a').each(function() {
  var $this = $(this);
  addActiveClass($this);
})

//Close other submenu in sidebar on opening any

sidebar.on('show.bs.collapse', '.collapse', function() {
  sidebar.find('.collapse.show').collapse('hide');
});






/*jQuery(window).scroll(function() {
  if ($(window).scrollTop() > 70) {
      $('.fixed-top').addClass('bg-white navbar-light').removeClass('navbar-dark');
      $('.navbar-brand img').attr('src', 'assets/images/logo.png');
  } else {
      $('.fixed-top').removeClass('bg-white navbar-light').addClass('navbar-dark');
      $('.navbar-brand img').attr('src', 'assets/images/logo-white.png');
  }
});
$(document).ready(function() {
  $(".scroll-on").on('click', function(event) {

    if (this.hash !== "") {
      event.preventDefault();

      
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
        window.location.hash = hash;
      });
    } 
  });
});
$('#navbarCollapse').on('show.bs.collapse', function () {
  $(this).closest('body').addClass('navbar-open');
})
$('#navbarCollapse').on('hide.bs.collapse', function () {
  $(this).closest('body').removeClass('navbar-open');
})*/
