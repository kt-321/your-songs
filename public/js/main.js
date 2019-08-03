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


var items = [];
 
for(var i = 1; i <= 105; i++){
  items.push('item-'+i);
}
 
Vue.component('paginate', VuejsPaginate)
new Vue({
   el: '#app',
   data: {
     items: items,
     parPage: 10,
     currentPage: 1
   },
   methods: {
    clickCallback: function (pageNum) {
       this.currentPage = Number(pageNum);
    }
   },
   computed: {
     getItems: function() {
      let current = this.currentPage * this.parPage;
      let start = current - this.parPage;
      return this.items.slice(start, current);
     },
     getPageCount: function() {
      return Math.ceil(this.items.length / this.parPage);
     }
   }
 })