<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery-ui.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/plugins/select2/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/jquery.inputmask.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/timepicker/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>

<script>
  
    $(function(){ //for sending sms...
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
        }         
      }); 
         //for generating shop list on order.create page
      $("#goods_id").change(function(){
        $.get('../shop_search/'+$(this).children('option:selected').val(),function(data){
          var obj = eval("("+data+")");
          $("#shop_id").val("");
          $("#shop_id").empty();
          for (var i =0;  i <obj.length; i++){
            $("#shop_id").append("<option value='"+obj[i].id+"'>"+obj[i].shop_name+"</option>");
          };
        });
        $.get('../goods_supportings/'+$(this).children('option:selected').val(),function(data){
          var obj = eval("("+data+")");
          //alert(obj[0].supportings.length);
          $("#supporting_doctype").val("");
          $("#supporting_doctype").empty();
          for (var i =0;  i <obj[0].supportings.length; i++){
            $("#supporting_doctype").append("<option value='"+obj[0].supportings[i].title+"'>"+obj[0].supportings[i].title+"</option>");
          };
        });
      });
      //show bankcard list corresponding to customer id;
      $("#customer_id").change(function(){
        $.get('../bankcard_search/'+$(this).children('option:selected').val(),function(data){
          var obj = eval("("+data+")");
          $("#bankcard_id").val("");
          $("#bankcard_id").empty();
          for (var i =0;  i <obj.length; i++){
            $("#bankcard_id").append("<option value='"+obj[i].id+"'>"+obj[i].bincode+"</option>");
          };
        });
      });


     }); 

    
    

    $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //申请人姓名搜索 order.create page
    $(".customer-select2").select2({
      ajax: {
        url: "../customer_search",
        dataType: 'json',
        delay: 500,
        data: function (params) {
          return {
            q: params.term, // search term
            page: params.page
          };
        },
        processResults: function (data, page){
            return {
                results: data.data
            };
        },
        cache: true
      },
      placeholder: "输入姓名搜索...",
    });

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //
    $("#datemask3").inputmask("mm/yyyy", {"placeholder": "mm/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    $(".timepicker").timepicker({
      showInputs: false
    });

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: "yyyy/mm/dd"
    });

    
  });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->