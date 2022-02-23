<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Ai Solutions Dashboard') }}</title>
    <!--<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">-->
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#00aba9">
  <meta name="theme-color" content="#ffffff">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  
  <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <link href="{{ asset('material') }}/css/custom_style.css?v=1.2" rel="stylesheet" />
  <link href="{{ asset('material') }}/css/custom_loader.css" rel="stylesheet" />

  <link href="{{ asset('material') }}/css/daterangepicker.min.css" rel="stylesheet" />
  <link href="{{ asset('material') }}/css/jquery.dreamalert.css" rel="stylesheet" />


  


  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->

    @yield('page-script-head')
    </head>
    <body class="{{ $class ?? '' }}">
      <!-- BEGIN LOADER -->
      <div id="load_screen">
        <div class="loader-content">
          <div class="spinner-grow align-self-center"></div>
        </div>
      </div>
      <!--  END LOADER -->  

      
      
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @if(auth()->user()->is_accept==1)
              @include('layouts.page_templates.auth')
            @else
            @include('layouts.page_templates.license')
            @endif
        @endauth
        @guest()
            @include('layouts.page_templates.guest')
        @endguest

        <div class="fixed-plugin">
          <div class="dropdown show-dropdown">
            <ul class="dropdown-menu">
              <li class="header-title"> Sidebar Filters</li>
              <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                  <div class="badge-colors ml-auto mr-auto">
                    <span class="badge filter badge-purple " data-color="purple"></span>
                    <span class="badge filter badge-azure" data-color="azure"></span>
                    <span class="badge filter badge-green" data-color="green"></span>
                    <span class="badge filter badge-warning active" data-color="orange"></span>
                    <span class="badge filter badge-danger" data-color="danger"></span>
                    <span class="badge filter badge-rose" data-color="rose"></span>
                  </div>
                  <div class="clearfix"></div>
                </a>
              </li>
              <li class="header-title">Images</li>
              <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('material') }}/img/sidebar-1.jpg" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('material') }}/img/sidebar-2.jpg" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('material') }}/img/sidebar-3.jpg" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('material') }}/img/sidebar-4.jpg" alt="">
                </a>
              </li>
              <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-laravel" target="_blank" class="btn btn-primary btn-block">Free Download</a>
              </li>
              <li class="button-container">
                <a href="https://material-dashboard-laravel.creative-tim.com/docs/getting-started/laravel-setup.html" target="_blank" class="btn btn-default btn-block">
                  View Documentation
                </a>
              </li>
              <li class="button-container github-star">
                <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard-laravel" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
              </li>
              <li class="header-title">Thank you for 95 shares!</li>
              <li class="button-container text-center">
                <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
                <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
                <br>
                <br>
              </li>
            </ul>
          </div>
        </div>
        <!--   Core JS Files   -->
        {{--<script src="{{ asset('material') }}/js/core/jquery.min.js"></script>--}}
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        <script src="{{ asset('material') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Plugin for the momentJs  -->
        <script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
        <!-- Forms Validations Plugin -->
        <script src="{{ asset('material') }}/js/plugins/jquery.validate.min.js"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="{{ asset('material') }}/js/plugins/jquery.bootstrap-wizard.js"></script>
        <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-selectpicker.js"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
        <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-tagsinput.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="{{ asset('material') }}/js/plugins/jasny-bootstrap.min.js"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="{{ asset('material') }}/js/plugins/fullcalendar.min.js"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="{{ asset('material') }}/js/plugins/jquery-jvectormap.js"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{ asset('material') }}/js/plugins/nouislider.min.js"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="{{ asset('material') }}/js/plugins/arrive.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE'"></script>
        <!-- Chartist JS -->
        <script src="{{ asset('material') }}/js/plugins/chartist.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('material') }}/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
       
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.16.0/moment.min.js" type="text/javascript"></script>
        <script src="{{ asset('material') }}/js/jquery.daterangepicker.min.js" type="text/javascript"></script>
        <script src="{{ asset('material') }}/js/jquery.dreamalert.js" type="text/javascript"></script>
      <!--   <script src="{{ asset('material') }}/js/sweetalert2.js" type="text/javascript"></script> -->
        
        @stack('js')
        @yield('page-script')
    
    <script>


      $(document).ready(function(){
        if($('#date-range').val()){
          
          get_range_hours();
        }
        
        function get_range_hours(){
          var date= $('#date-range').val();
          var dates = date.split(" ~ ");
          var startdate=dates[0];
          var enddate=dates[1];
          var routeToPostTo='/get_total_hours';
          $.ajax({
               type:'POST',
               url: routeToPostTo,
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               data:{startdate:startdate,enddate:enddate},
               success:function(data){
                $('.hours-count').text(data);
               }
           });
        }
        $('.company_id').on('change', function() {
              var company_id= this.value;
              var routeToPost='/get_company_users';
              $.ajax({
                   type:'POST',
                   url: routeToPost,
                   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                   data:{company_id:company_id},
                   success:function(data){
                    $('.companyusers').css('display','flex');
                    $('.companyusers').html(data);
                   }
               });
        });

        $(".apply-btn").click(function (e) {
          var date= $('#date-range').val();
          var dates = date.split(" ~ ");
          var startdate=dates[0];
          var enddate=dates[1];
          var routeToPostTo='/get_total_hours';
          $.ajax({
               type:'POST',
               url: routeToPostTo,
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               data:{startdate:startdate,enddate:enddate},
               success:function(data){
                $('.hours-count').text(data);
                   $("#toggleStatus").append( "<div class=\"alert alert-success alert-dismissible fade show\" id=\"toggleMessage\" role=\"alert\" >\n" +
                       "        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">\n" +
                       "            <span class=\"material-icons\">close</span>\n" +
                       "        </button>\n" +
                       "        <span>The status is changed!</span>\n" +
                       "    </div>" );
                   hideAlert();
               }
           });
        });
        var expanded      = localStorage.getItem("expanded") === "false";
        expandCompact();
        $('#expand-compact').on('click', expandCompact);
        function expandCompact(){
        
          if(expanded){
            console.log("yes");
            $('.sidebar').show();
            $('.main-panel').css('width', 'calc(100% - 260px)');
            expanded = false;
            localStorage.setItem("expanded",false);
          }else{
            
            $('.sidebar').hide();
            $('.main-panel').css('width', '100%');
            expanded = true;
            localStorage.setItem("expanded",true);
            
          }
        }

       $(".btn-submit").click(function (e) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Yes, Do it!',
            buttonsStyling: false
            }).then((result) => {
              if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                var formData = {
                    id: $(this).data('id'),
                    price: $(this).data('price'),
                    users: $(this).data('users'),
                };
                var ajaxurl = '/user_add_batch';
                var type = "POST";
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        if(data.success){
                          Swal.fire(
                            'success!',
                            'Subscribed Successfully',
                            'success'
                          )
                          setTimeout(function(){ 
                              location.href="/users/create";
                          }, 3000);
                        }else{
                          Swal.fire(
                            'Cancelled',
                            'Something went wrong.',
                            'error'
                          )
                        } 
                    },
                    error: function (data) {
                       Swal.fire(
                          'Cancelled',
                          'Something went wrong.',
                          'error'
                        )
                    }
                });
              } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                  'Cancelled',
                  'You have Cancelled request :)',
                  'error'
                )
              }
        })
      });


        $('#input-role').on('change', function() {
          if(this.value !='super admin'){
            $('#company_section').show('fast');
          }else{
            $('#company_section').hide('fast');
          }
        });
      });
    </script>
    <script type="text/javascript">
        var options = {
      startOfWeek: 'monday',
      separator: ' ~ ',
      format: 'YYYY-MM-DD',
      autoClose: false,
    };

    $('#date-range').dateRangePicker(options);

    function hideAlert(id) {
            $('#toggleMessage').delay(3500).slideUp(300).delay(350,function () {
                $(this).remove();
            });
       }
    </script>

    <script>
      $(document).ready(function(){
        $("#load_screen").remove();
      })


      /* Dropbox file upload */
      function readFile(input) {
        if (input.files && input.files[0]) {
          console.log(input.files[0]);
          var reader = new FileReader();

          reader.onload = function(e) {
          if(input.files[0].type=='application/pdf'){
            var htmlPreview =
              '<img width="200" src="{{asset('pdf.png')}}" style="object-fit: contain;"/>'+
              '<button type="button" class="btn btn-danger btn-xs remove-preview">'+
              '<i class="fa fa-times"></i></button>';
          }else if(input.files[0].type=='image/png' || input.files[0].type=='image/jpg' || input.files[0].type=='image/jpeg' || input.files[0].type=='image/gif' || input.files[0].type=='image/svg'){
              var htmlPreview =
              '<img width="200" src="' + e.target.result + '" />'+
              '<button type="button" class="btn btn-danger btn-xs remove-preview">'+
              '<i class="fa fa-times"></i></button>';
          }else{
            var htmlPreview =
              '<img width="200" src="{{asset('doc.png')}}" />'+
              '<button type="button" class="btn btn-danger btn-xs remove-preview">'+
              '<i class="fa fa-times"></i></button>';
          }
               
            var wrapperZone = $(input).parent();
            var previewZone = $(input).parent().parent().find('.preview-zone');
            var boxZone = $(input).parent().parent().find('.preview-zone').find('.box-body');
            $('.upload_btn').addClass('mt-custom');
            $('.preview-zone').addClass('image-preview');

            wrapperZone.removeClass('dragover');
            previewZone.removeClass('hidden');
            boxZone.empty();
            boxZone.append(htmlPreview);
          };

          reader.readAsDataURL(input.files[0]);
        }
      }

      function reset(e) {
        e.wrap('<form>').closest('form').get(0).reset();
        e.unwrap();
      }

      $(".dropzone").change(function() {
        readFile(this);
      });

      $('.dropzone-wrapper').on('dragover', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('dragover');
      });

      $('.dropzone-wrapper').on('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragover');
      });

      $('body').on('click','.remove-preview',function(){
        var boxZone = $(this).parent('.box-body');
        $('.dropzone').val('');
        boxZone.empty();
        $('.upload_btn').removeClass('mt-custom');
        $('.preview-zone').removeClass('image-preview');
        
      });
      
    </script>

    <script type="application/javascript">
  $(".header_toogle").click(function(){
    $(".usr-dropdown").slideToggle();
  })

function crossOne() {
    $('.cookiepolicy').hide();
}



function closeCookieBar() {
   var elementExists =  $(".cookiepolicy");
    if(elementExists){
        $('.cookiepolicy').hide()
        tmgSetCookie("cookiepolicy", 1, 8);
    }
}

function tmgSetCookie(a, b, c) {
    var d = new Date;
    if (c) {
        d.setTime(d.getTime() + c * 24 * 60 * 60 * 1000);
        var e = "; expires=" + d.toGMTString();
    } else {
        var f = new Date(d.getFullYear(), d.getMonth(), d.getDate(), 23, 59, 59);
        var e = "; expires=" + f.toGMTString();
    }
    document.cookie = a + "=" + b + e + "; path=/"
}
function tmgGetCookie(a) {
    var b = a + "=";
  var c = document.cookie.split(";");
  for (var d = 0; d < c.length; d++) {
      var e = c[d];
      while (e.charAt(0) == " ")
              e = e.substring(1, e.length);
          if (e.indexOf(b) == 0)
              return e.substring(b.length, e.length)
      }
    return null
}
function tmgDeleteCookie(a) {
    tmgSetCookie(a, "", -1)
}

function tmgInitCookie() {
    if (tmgGetCookie("cookiepolicy") == null) {
        var proto = (("https:" == document.location.protocol) ? "https://" : "http://");


        

        var t = '<div class="alert alert-cookie clearfix position-fixed mb-1 d-lg-flex align-items-lg-center flex-wrap">';
        t += '<i class="material-icons float-left">privacy_tip</i>';
        t += '<span class="float-left text">Ai Solutions uses cookies to enhance your experience. We use these for advertising and analytics purposes. By continuing to use our site, you agree to our use of cookies </span>';
        t += '<button type="button" class="close btn btn-cookie float-lg-left float-md-left float-sm-left float-right" data-dismiss="alert" aria-label="Close">';
        t += '<span class="text-capitalize" onclick="closeCookieBar();">I Accept </span>';
        t += '</button>';
        t += '</div>';







        // t = '<span class="cookiepolicy-notice">INDY GUIDE uses cookies to give you the best possible service. If you continue browsing, you agree to the use of cookies. More details can be found in <a href="'+privacy_url+'" target="_blank">our privacy policy</a></span><span class="cookies-buttons"><span class="cookies-close" onclick="crossOne()">Close</span><span class="cookiepolicy-accept-cookies" onclick="closeCookieBar();">Accept</span></span>';
        var a = '<div class="cookiepolicy-wrapper"><div class="cookiepolicy-txt"><span class="cookiepolicy-notice">' + t + '</div></div>';
        var body = document.getElementsByTagName('body')[0];
        var newdiv = document.createElement('div');
        newdiv.setAttribute('class', 'cookiepolicy');
        newdiv.innerHTML = a;
        body.insertBefore(newdiv, body.firstChild);
    }
}
var readyStateCheckInterval = setInterval(function () {
    if (document.readyState === "complete") {
        tmgInitCookie();
        clearInterval(readyStateCheckInterval);
    }

}, 10);

</script>


    <div id="ajax_loader" style="display: none;" class="loader-wrapper">
      <div class="circle-wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="shadow"></div>
        <div class="shadow"></div>
        <div class="shadow"></div>
        <span>Processing...</span>
      </div>
    </div>
  </body>
</html>
