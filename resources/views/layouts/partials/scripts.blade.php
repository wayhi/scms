<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery-ui.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/plugins/select2/select2.min.js') }}" type="text/javascript"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
   });
    $(function(){ 
      $("#send_to_number").autocomplete({ 
        delay:500,
        source: "../mobile_search", 
        minLength: 5,
        select: function(event,ui){
         $.get('../name_search?term='+ui.item.value,function(data){
         	var obj = eval("("+data+")");
         	$("#send_to").val(obj[0].name);
         	$("#send_to_display").val(obj[0].name);
         	$("#customer_id").val(obj[0].id);

         });
          //autocomplete("search",ui.item.label);
        }         
      }); 
    }); 
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->