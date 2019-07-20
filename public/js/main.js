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
