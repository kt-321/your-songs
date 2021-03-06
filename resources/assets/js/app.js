
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// import Vue from 'vue'
var VueScrollTo = require('vue-scrollto');
Vue.use(VueScrollTo)

var VueCarousel = require('vue-carousel');
Vue.use(VueCarousel)

var VueDraggable = require('vuedraggable');
Vue.use(VueDraggable)


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component("food-component", require("./components/FoodComponent.vue").default);

// Vue.component("recommended-songs-component", require("./components/RecommendedSongsComponent.vue").default);

Vue.component("favorite-component", require("./components/FavoriteComponent.vue").default);



const app = new Vue({
    el: '#app',
    components: {
    carousel: VueCarousel.Carousel,
    slide: VueCarousel.Slide,
     },
    data: {
        toBottom: '#bottom',
        toTop: '#top',
        
    },
    
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
