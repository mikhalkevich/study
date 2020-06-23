$(function(){
   $('#parse_onliner').click(function(){
      $.ajax({
         type:'post',
         url:'/ajax/parse/onliner_product',
         beforeSend:function(){
          $('#parse_empty').html('Идет парсинг onliner.by <img src="/InsistentTautGodwit-size_restricted.gif">');
         },
         success:function(data){
             $('#parse_empty').html(data);
         },
          error:function(data){
             console.log(data);
          }
      });
   });
});
