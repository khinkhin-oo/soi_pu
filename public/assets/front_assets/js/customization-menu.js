  
  function changeQuantity(ref)
  {
     var single_select_cost = 0;
  
     var multy_select_cost = 0;
     
     var final_cost     = 0;

     var default_dish_price = 0;


     var parent_form = jQuery(ref).closest('form')

     var quantity = $(ref).val();


      var default_dish_price = parent_form.find('input[name="without_size_dish_price"]').val();

      // alert(default_dish_price);

     /*Code for add selected size price*/
     parent_form.find('input[type="radio"]').each(function (index) {
        
        var this_checked = jQuery(this).prop('checked');
        if (this_checked)
        {
          single_select_cost = Number(single_select_cost) + Number(jQuery(this).attr('data-size-price'));
        }
         var size_name =  jQuery(this).attr('data-size-name');
         parent_form.find("#size_name").val(size_name);

     });


     /*Code for add checked addons price add*/

     parent_form.find('input[type="checkbox"]').each(function (index) {
        
        var this_checked = jQuery(this).prop('checked');

        if (this_checked)
        {
          multy_select_cost = Number(multy_select_cost) + Number(jQuery(this).attr('data-toppins-price'));
        }
        
     });

    final_cost     = (Number(default_dish_price) + Number(single_select_cost) + Number(multy_select_cost)) * (Number(quantity));

    
    content_cost = 'Add to bag : $ '+Number(final_cost).toFixed(2)+' ';
    content_cost1 = '$ '+Number(final_cost).toFixed(2)+' ';
    parent_form.find('#final_cost').html(content_cost); 
    parent_form.find("#final_cost").attr('data-quantity',quantity);
    parent_form.find("#quantity").val(quantity);
    parent_form.find('#final_cost1').html(content_cost1); 

  }
  
function calculateTotal(ref) 
{
  var ele = jQuery(ref);
 
  var parent_form = jQuery(ref).closest('form');

  var quantity = parent_form.find('input[name="iteam_quantity"]').val();

 // var min_size = parent_form.find('input[name="min_size"]').val(); 26thdec

  var modifier_size = parent_form.find('input[name="modifier_size"]').val();

 

 // var quantity = $("#dropdown_1 option:selected").val();

  var default_dish_price = 0;

  var default_dish_price = parent_form.find('input[name="without_size_dish_price"]').val();
  
  // alert(default_dish_price);

  var single_select_cost = 0;
  
  var multy_select_cost = 0;
  
  var final_cost     = 0;

  var count = 0;
  

  parent_form.find('input[type="radio"]').each(function (index) {
     
     var this_checked = jQuery(this).prop('checked');
     if (this_checked)
     {
        single_select_cost      = Number(single_select_cost) + Number(jQuery(this).attr('data-size-price'));
     }
         var size_name =  jQuery(this).attr('data-size-name');
         parent_form.find("#size_name").val(size_name);
     

  });
  
     /*for (var i = 0; i < 3; i++) {
        alert($(":checkbox.size-toppins-check:checked[data-checkbox-id=1]").length);
     }*/
  parent_form.find('input[type="checkbox"]').each(function (index) {

     var this_checked = jQuery(this).prop('checked');

     if (this_checked)
     {
        count=count+1;
       
       multy_select_cost     = Number(multy_select_cost) + Number(jQuery(this).attr('data-toppins-price'));
     }
  });

  /*alert(default_dish_price);
  alert(single_select_cost);
  alert(multy_select_cost);
  alert(quantity);*/
  var i;

var classcheck = document.getElementsByClassName('class-harsh');
  if (classcheck.length > 0) {
    for (i = 0; i < modifier_size; i++) { 
       var min_size    = parent_form.find('input[name="min_size_'+i+'"]').val();
       if(min_size==0){
        this["number_"+i] = true;
       }else{
        this["number_"+i] = false;
       }
    }
  }

  for (i = 0; i < modifier_size; i++) { 
    
    var min_size    = parent_form.find('input[name="min_size_'+i+'"]').val();
    var checkbox_id = $(ref).attr('data-checkbox-id');

    if(checkbox_id == i){

      var size = $(":checkbox.size-toppins-check:checked[data-checkbox-id="+i+"]").length;
      if(min_size!=0){

        if(size==min_size){
           this["number_"+i] = true;
      parent_form.find('#error_text_'+i+'').html('');  

          // parent_form.find('#disable_button').removeClass('add-cart-button-main-div');  
        }else{
          // parent_form.find('#disable_button').addClass('add-cart-button-main-div');
          this["number_"+i] = false;
          parent_form.find('#error_text_'+i+'').html('Maximum number of options exceeded'); 
        }
      }else{
        this["number_"+i] = true;
      }
    }

  }


  var flag =1;
  for (i = 0; i < modifier_size; i++) { 
    if(this["number_"+i]==false){
       
      flag =0;
     }/*else{
     }*/
  }

    if(flag==1){
      parent_form.find('#disable_button').removeClass('add-cart-button-main-div');  
      parent_form.find('#disable_button2').removeClass('add-cart-button-main-div');  
    }else if(flag==0){
      parent_form.find('#disable_button').addClass('add-cart-button-main-div');  
      parent_form.find('#disable_button2').addClass('add-cart-button-main-div');  
    }

 final_cost     = (Number(default_dish_price) + Number(single_select_cost) + Number(multy_select_cost)) * (Number(quantity));
  
  content_cost = 'Add to bag : $ '+Number(final_cost).toFixed(2)+' ';
  content_cost1 = '$ '+Number(final_cost).toFixed(2)+' ';
  parent_form.find('#final_cost').html(content_cost); 
  parent_form.find('#final_price').val(final_cost); 
  parent_form.find("#quantity").val(quantity);
  parent_form.find("#final_cost").attr('data-quantity',quantity);
  parent_form.find('#final_cost1').html(content_cost1); 
  parent_form.find('#disable_button').removeClass('class-harsh');

}



function add_quantity(ref,event)
  {
    event.stopPropagation();
    
    var currency = jQuery(ref).parent().parent().find('button[name="currency"]').val();
    var que_input = jQuery(ref).parent().parent().find('input[name="iteam_quantity"]'); 
    var quantity = jQuery(ref).parent().parent().find('input[name="iteam_quantity"]').val();

    if(quantity<10) 
    {
      quantity++;
    }

     que_input.val(quantity);      
  
     var ele = jQuery(ref);
     var type = jQuery(ref).attr('data-cost');
     var parent_form = jQuery(ref).closest('form')
     var quantity = parent_form.find('input[name="iteam_quantity"]').val();


     var single_select_cost = 0;
    
     var multy_select_cost = 0;
     
     var dish_price     = 0;
    

     var final_cost     = 0;
    
    //dish_price      = parent_form.find('input[name="dish_price"]').val();
    // var default_dish_price = parent_form.find('input[name="without_size_dish_price"]').val();
     var single_select_cost = parent_form.find('input[name="without_size_dish_price"]').val();
      //alert(dish_price);

    parent_form.find('input[type="radio"]').each(function (index) {
        
      var this_checked = jQuery(this).prop('checked');
      if (this_checked)
      {
         single_select_cost = Number(single_select_cost) + Number(jQuery(this).attr('data-size-price'));
      }
        
     });
  
  
     parent_form.find('input[type="checkbox"]').each(function (index) {
        
        var this_checked = jQuery(this).prop('checked');
        if (this_checked)
        {
          multy_select_cost = Number(multy_select_cost) + Number(jQuery(this).attr('data-toppins-price'));
        }
        
     });
   /* alert(single_select_cost);
    alert(multy_select_cost);
    alert(dish_price);
    alert(quantity);
*/
    final_cost     = (Number(single_select_cost)+Number(multy_select_cost)+Number(dish_price))*(Number(quantity));
   /*
    content_cost = currency+Number(final_cost).toFixed(2)+' |';
    parent_form.find('#final_cost').html(content_cost); */
    content_cost = 'Add to bag : $ '+Number(final_cost).toFixed(2)+' ';
    content_cost1 = '$ '+Number(final_cost).toFixed(2)+' ';
    parent_form.find('#final_cost').html(content_cost); 
    parent_form.find("#quantity").val(quantity);
    parent_form.find("#final_cost").attr('data-quantity',quantity);
    parent_form.find('#final_cost1').html(content_cost1); 

  }
  
  function substract_quantity(ref,event) 
  {
    // event.stopPropagation();

     var currency = jQuery(ref).parent().parent().find('button[name="currency_symb"]').val();
     var que_input = jQuery(ref).parent().parent().find('input[name="iteam_quantity"]'); 
     var quantity = jQuery(ref).parent().parent().find('input[name="iteam_quantity"]').val();

     if(quantity>1) 
     {
       quantity--;
     }
     
    que_input.val(quantity); 
  
    var ele = jQuery(ref);
    var type = jQuery(ref).attr('data-cost');
    var parent_form = jQuery(ref).closest('form')
    var quantity = parent_form.find('input[name="iteam_quantity"]').val();
  
    var single_select_cost = 0;
    
    var multy_select_cost = 0;
    
    var dish_price = 0;
     
    var final_cost = 0;
      
   // dish_price      = parent_form.find('input[name="dish_price"]').val();
     // var default_dish_price = parent_form.find('input[name="without_size_dish_price"]').val();
      var single_select_cost = parent_form.find('input[name="without_size_dish_price"]').val();
    
    parent_form.find('input[type="radio"]').each(function (index) {
        
    var this_checked = jQuery(this).prop('checked');
    if (this_checked)
    {
        single_select_cost = Number(single_select_cost) + Number(jQuery(this).attr('data-size-price'));
    }
        
    });
  
  
     parent_form.find('input[type="checkbox"]').each(function (index) {
        
        var this_checked = jQuery(this).prop('checked');
        if (this_checked)
        {
           multy_select_cost = Number(multy_select_cost) + Number(jQuery(this).attr('data-toppins-price'));
        }
        
     });
     
     final_cost     = (Number(single_select_cost)+Number(multy_select_cost)+Number(dish_price))*(Number(quantity));
     
     content_cost = 'Add to bag : $ '+Number(final_cost).toFixed(2)+' ';
    content_cost1 = '$ '+Number(final_cost).toFixed(2)+' ';
    parent_form.find('#final_cost').html(content_cost);
    parent_form.find("#quantity").val(quantity); 
   parent_form.find("#final_cost").attr('data-quantity',quantity);
    parent_form.find('#final_cost1').html(content_cost1); 

     //Concat caleroies extension..
  }