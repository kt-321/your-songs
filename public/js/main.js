new Vue({
  el: "#recommended-songs",
  components: {
    carousel: VueCarousel.Carousel,
    slide: VueCarousel.Slide
  }
});

new Vue({
  el: "#recommended-users",
  components: {
    carousel: VueCarousel.Carousel,
    slide: VueCarousel.Slide
  }
});

// $(function(){
//   $(".btn-dell").click(function(){
//   if(confirm("本当に削除しますか？")){
//   //そのままsubmit（削除）
//   }else{
//   //cancel
//   return false;
//   }
//   });
//   });

// document.getElementById("btn-dell").onclick = function() {
//   if(confirm("本当に削除しますか？")){
//   //そのままsubmit（削除）
//   }else{
//   //cancel
//   return false;
//   }
// };

// document.getElementById("btn-dell").onclick = function() {
//   if(!window.confirm('本当に削除しますか？')){
//       window.alert('キャンセルされました'); 
//       return false;
//   }
//   document.deleteform.submit();
// };

function delete_alert(){
  if(!window.confirm('本当に削除しますか？')){
      window.alert('キャンセルされました'); 
      return false;
  }
  document.deleteform.submit();
};