
 $('#search').on('keyup',function(){
    $value=$(this).val(); 
        $.ajax({
        type : 'get',
        url : 'searchPromo',
        data:{'key':$value},
        success:function(data){
        $('#div').html(data);
    }})
    
    
    }) 
// $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
