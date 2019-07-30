// new Vue({
//   el: "#recommended-songs",
//   components: {
//     carousel: VueCarousel.Carousel,
//     slide: VueCarousel.Slide
//   }
// });

// new Vue({
//   el: "#recommended-users",
//   components: {
//     carousel: VueCarousel.Carousel,
//     slide: VueCarousel.Slide
//   }
// });

// new Vue({
//   el: '#app',
//   data: {
//     toBottom: '#bottom',
//     toTop: '#top'
//   }
// })

function delete_alert(){
  if(!window.confirm('本当に削除しますか？')){
      window.alert('キャンセルされました'); 
      return false;
  }
  document.deleteform.submit();
};

function force_delete_alert(){
  if(!window.confirm('本当に完全に削除しますか？')){
      window.alert('キャンセルされました'); 
      return false;
  }
  document.deleteform.submit();
};

// new Vue({
//   el: '#app',
//   methods: {
//     alert: function() {
//       this.$swal({
//   title: "最初のアラート",
//   text: "ボタンによって反応が変わります",
//   icon: "warning",
//   buttons: true,
//   dangerMode: true,
// })
// .then((willDelete) => {
//   if (willDelete) {
//     this.$swal("Okボタンが押されました。", {
//       icon: "success",
//     });
//   } else {
//     this.$swal("Cancelされました。");
//   }
// });
//     }
//   }
// })
 

// function force_delete_alert(){
//   if(!window.confirm('本当に完全に削除しますか？')){
//       window.alert('キャンセルされました'); 
//       return false;
//   }
//   document.deleteform.submit();
// };
