$("#selectAll").change(function() {
    $(".product_checkbox").prop("checked", $(this).prop("checked")) 
 });
$(".product_checkbox").change(function(){
    if($(this).prop("checked")==false){
        $("#selectAll").prop("checked",false);
    }
    if($(".product_checkbox:checked").length == $(".product_checkbox").length){
        $("#selectAll").prop("checked",true);
    }
 });