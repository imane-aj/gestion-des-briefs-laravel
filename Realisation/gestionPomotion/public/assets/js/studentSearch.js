

  let input = document.querySelector('.input');
  let text = document.querySelector('.title');
  let butn = document.querySelector('.butn');

  input.setAttribute("type", "hidden");
  
  function change(){
      input.setAttribute("type", "text");
      text.style.display = "none"
      butn.style.cssText = null;
  }
  butn.style.cssText = 'position: absolute; right: 0; marginTop: 0.5em'

  $('#searchS').on('keyup',function(){
      $value=$(this).val();
      $token=$('#token').val();
          $.ajax({
          type : 'get',
          url : '/student/searchStudent',
          data:{'key':$value, 'token':$token},
          success:function(data){
          $('#div').html(data);
      }})
  }) 
// $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
// data:{'key':$value, 'token':'{{$promotion->token}}'}