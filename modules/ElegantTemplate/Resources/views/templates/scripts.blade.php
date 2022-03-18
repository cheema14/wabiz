
 <!-- Popper -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
 
 <!-- jQuery -->
 <script src="{{ asset('argonfront') }}/js/core/jquery.min.js" type="text/javascript"></script>

  <!-- Bootstrap -->
 <script src="{{ asset('argonfront') }}/js/core/bootstrap.min.js" type="text/javascript"></script>

 <script>
    var CASHIER_CURRENCY = "<?php echo  config('settings.cashier_currency') ?>";
    var LOCALE="<?php echo  App::getLocale() ?>";
    var IS_POS=false;
</script>
<script src="{{ asset('custom') }}/js/cartFunctions.js"></script>

<script
      src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
      integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>


@if (isset($showGoogleTranslate)&&$showGoogleTranslate&&!$showLanguagesSelector)
    @include('googletranslate::scripts')
@endif

 
 


 <!-- scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/min/tiny-slider.js"></script>


 <!-- Custom js -->
 <script src="{{ asset('custom') }}/js/order.js"></script>

 <!-- Interface from PHP items to JS Array -->
 @include('restorants.phporderinterface') 

 <!-- All in one -->
 <script src="{{ asset('custom') }}/js/js.js?id={{ config('config.version')}}"></script>
 <script src="{{ asset('custom') }}/js/eleganttemplate.js"></script>
 <script>
     function openNav(){
      $("#theCartBottomButtonDiv").hide();
      document.body.classList.toggle("mobile-menu-opened");
    }

    

 </script>
<div style="margin-top:50px;">
    @include('elegant-template::templates.pages_footer')
<div>