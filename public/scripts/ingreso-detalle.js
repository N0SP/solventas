$(document).ready(function(){
 
    $(document).on('click', '#btnguardar', function(){
     $('#item_table').append(html);
    });
    
    $(document).on('click', '.remove', function(){
     $(this).closest('tr').remove();
    });
    
    $('#insert_form').on('submit', function(event){
     event.preventDefault();
     var error = '';
     $('.item_name').each(function(){
      var count = 1;
      if($(this).val() == '')
      {
       error += "<p>Enter Item Name at "+count+" Row</p>";
       return false;
      }
      count = count + 1;
     });
     
     $('.item_quantity').each(function(){
      var count = 1;
      if($(this).val() == '')
      {
       error += "<p>Enter Item Quantity at "+count+" Row</p>";
       return false;
      }
      count = count + 1;
     });
     
     $('.item_unit').each(function(){
      var count = 1;
      if($(this).val() == '')
      {
       error += "<p>Select Unit at "+count+" Row</p>";
       return false;
      }
      count = count + 1;
     });
     var form_data = $(this).serialize();
     if(error == '')
     {
      $.ajax({
       url:"insert.php",
       method:"POST",
       data:form_data,
       success:function(data)
       {
        if(data == 'ok')
        {
         $('#item_table').find("tr:gt(0)").remove();
         $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
        }
       }
      });
     }
     else
     {
      $('#error').html('<div class="alert alert-danger">'+error+'</div>');
     }
    });
    
   });