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
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<script>
  
    function createInput(parent,inputDescription,value,i){//add dynamic inputs for related information    
       
      var  aElement=document.createElement("input"); //创建input  
      aElement.name="input_"+i;  
      aElement.id="input_"+i;  
      aElement.type="text"; 
      aElement.value=value; 
      var lbl = document.createElement("label");
      lbl.name="name_"+i;  
      lbl.id="name_"+i;  
      lbl.type="hidden";
      lbl.value= inputDescription;
      lbl.innerHTML = inputDescription+": ";
      parent.appendChild(lbl); 
      parent.appendChild(aElement);//将div容器加入父元素 

        
    }  

    function saveInput(){
      var source = document.getElementById('related_inputs');
      //var target = document.getElementsByName('goods_info')[0].value;
      var elementChildren = source.children;
      var goods_info={goods:[]};
      var temp;
     
      
        //alert(elementChildren[i].name+elementChildren[i].value);
        //if((target !="") && (target !="{\"goods\": []}") && (target!="{}")){  
        //    goods_info = JSON && JSON.parse(target) || $.parseJSON(target);
        //}else{
            //goods_info = {goods:[]};
        //}
        for (var i = 0; i < elementChildren.length; i+=2) {
          temp = {field_name:elementChildren[i].value,field_value:elementChildren[i+1].value};
          goods_info.goods.push(temp);
        }
        document.getElementsByName('goods_info')[0].value = JSON.stringify(goods_info);
    }  

    function goodsInfo_Init(){
      var existing_info = document.getElementsByName('goods_info')[0].value;
      var parent=document.getElementById('related_inputs');

      if((existing_info !="") && (existing_info !="{\"goods\": []}") && (existing_info!="{}")){ 

            goods_info = JSON && JSON.parse(existing_info) || $.parseJSON(existing_info);
            
        }else{
            goods_info = {goods:[]};
      }
      //alert(goods_info.goods[0]['field_name']);
      while (parent.firstChild) {
            parent.removeChild(parent.firstChild);//remove existing input fields
          } 
      for (var i =0; i < goods_info.goods.length; i++) {
          createInput(parent,goods_info.goods[i]['field_name'],goods_info.goods[i]['field_value'],i);
        }  

    }

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
         //for generating shop list and supporting doctype on order.create page, also caculate the related amount value according to the selected goods settings.
      $("#goods_id").change(function(){
        $.get('../shop_search/'+$(this).children('option:selected').val(),function(data){
          var obj = eval("("+data+")");
          $("#shop_id").val("");
          $("#shop_id").empty();
          for (var i =0;  i <obj.length; i++){
            $("#shop_id").append("<option value='"+obj[i].id+"'>"+obj[i].shop_name+"</option>");
          };
        });
        $.get('../goods_info/'+$(this).children('option:selected').val(),function(data){
          var obj = eval("("+data+")");
          //alert(obj[0].supportings.length);
          $("#supporting_doctype").val("");
          $("#supporting_doctype").empty();
          for (var i =0;  i <obj[0].supportings.length; i++){
            $("#supporting_doctype").append("<option value='"+obj[0].supportings[i].title+"'>"+obj[0].supportings[i].title+"</option>");
          };
          var goods_spec = eval("("+obj[0].goods_spec+")");//get goods info
          var parent=document.getElementById('related_inputs');
          while (parent.firstChild) {
            parent.removeChild(parent.firstChild);//remove existing input fields
          } 
          for (var i =0;i<goods_spec['information'].length; i++) {//create input fields for data collection
            createInput(parent,goods_spec['information'][i].field_name,"",i);
          };
          saveInput();
          //
          
          var payout_rate = parseFloat(obj[0].payout_rate);
          var fund_rate = parseFloat(obj[0].fund_rate);
          var apply_amount = parseFloat($("#apply_amount").val());
          var downpayment_rate = parseFloat(obj[0].downpayment_rate);
          var downpayment_amount = parseFloat(obj[0].downpayment_amount);
          var return_pct = parseFloat(obj[0].return_pct);
          var handling_fee = parseFloat(obj[0].handling_fee);
          var handling_fee_rate = parseFloat(obj[0].handling_fee_rate);
          var repay_pct = parseFloat(obj[0].repay_pct);
          var repay_amount = parseFloat(obj[0].repay_amount);
          if(apply_amount){
            $("#platform_payout").val(Math.round(apply_amount*payout_rate)/100.00);
            $("#credit_given").val(Math.round(apply_amount*fund_rate)/100.00);
            $('#repay_target').val(Math.round(apply_amount*return_pct)/100.00);
            if(downpayment_rate==0){
              $("#downpayment_amount").val(downpayment_amount);
            }else{
              $("#downpayment_amount").val(Math.round(apply_amount*downpayment_rate)/100.00);
            };
            if(handling_fee_rate==0){
              $("#handling_fees").val(handling_fee);
            }else{
              $("#handling_fees").val(Math.round(apply_amount*handling_fee_rate)/100.00);
            };
            }
          
        });
      });

      $("#apply_amount").change(function(){
        
        $.get('../goods_info/'+$("#goods_id").val(),function(data){
          var obj = eval("("+data+")");
          var payout_rate = parseFloat(obj[0].payout_rate);
          var fund_rate = parseFloat(obj[0].fund_rate);
          var apply_amount = parseFloat($("#apply_amount").val());
          var downpayment_rate = parseFloat(obj[0].downpayment_rate);
          var downpayment_amount = parseFloat(obj[0].downpayment_amount);
          var return_pct = parseFloat(obj[0].return_pct);
          var handling_fee = parseFloat(obj[0].handling_fee);
          var handling_fee_rate = parseFloat(obj[0].handling_fee_rate);
          var repay_pct = parseFloat(obj[0].repay_pct);
          var repay_amount = parseFloat(obj[0].repay_amount);
          if(apply_amount){
            $("#platform_payout").val(Math.round(apply_amount*payout_rate)/100.00);
            $("#credit_given").val(Math.round(apply_amount*fund_rate)/100.00);
            $('#repay_target').val(Math.round(apply_amount*return_pct)/100.00);
            if(downpayment_rate==0){
              $("#downpayment_amount").val(downpayment_amount);
            }else{
              $("#downpayment_amount").val(Math.round(apply_amount*downpayment_rate)/100.00);
            };
            if(handling_fee_rate==0){
              $("#handling_fees").val(handling_fee);
            }else{
              $("#handling_fees").val(Math.round(apply_amount*handling_fee_rate)/100.00);
            };
            }
          
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

    //$("#receivables_table").DataTable();

    
  });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->