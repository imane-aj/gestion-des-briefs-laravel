
 $('#search').on('keyup',function(){
    $value=$(this).val(); 
        $.ajax({
        type : 'get',
        url : 'searchBrief',
        data:{'key':$value},
        success:function(data){
        $('#div').html(data);
    }})
    }) 