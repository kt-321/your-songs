<template>
    <div id="favorites-component">
        
        <!--以下は成功分-->
        <!--<div  v-for="list in songs" :key="key" class="lists">-->
            <div class="list-wrapper">
                <!--<draggable :options="{group: 'songs'}" element="ul" class="list-unstyled" @start="draggableStart" @end="drag=draggableEnd">-->
                <!--<draggable :options="{group: 'songs', animation: 200, delay: 30}" element="ul" class="list-unstyled">-->
                <!--<draggable :options="{group: 'songs', animation: 200, delay: 30}" tag="ul" class="list-unstyled">-->
                <draggable v-bind="{group: 'songs', animation: 200, delay: 30}" tag="ul" class="list-unstyled" @end="onEnd">
                    <div v-for="song, index in songs" :key="song.song_name" class="list">
                        <ul class="list-unstyled">
                            <li>{{ song.id }}</li>
                            <li>{{ song.song_name }}</li>
                            <li>{{ song.artist_name }}</li>
                            <li>{{ song.music_age }}年代</li>
                            <li>userID {{ song.user.name }}</li>
                            
                            
                            <li v-if="song.image_url">
                                <img :src="song.image_url" class="song-image img-thumbnail" style="with: 50px; height: 50px;">
                            </li>
                            <li v-else>
                                <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/song.jpeg" class="song-image img-thumbnail" style="with: 50px; height: 50px;">
                            </li>
                            
                            <button class="delete-button btn btn-primary" v-on:click="deleteData(song.id)">お気に入りから外す</button>
                            
                            <!--<button class="btn btn-success" v-on:click="getData(song.id)">曲詳細画面へ</button>-->
                            <!--<a href="http://a31093e8b14a4ad5b22fc0d062687d58.vfs.cloud9.us-east-1.amazonaws.com/songs/{{ song.id }}">詳細</a>-->
                            <!--<span class="del" v-on:click="doDelete(song, index, '')">[削除]</span>-->
                            <a :href="`http://a31093e8b14a4ad5b22fc0d062687d58.vfs.cloud9.us-east-1.amazonaws.com/songs/${song.id}`">詳細</a>
                        </ul>
                    </div>
                </draggable>
            </div>
        <!--</div>-->
        
            
            
            <!--以下は作成中-->
            <!--<div class="container">-->
                <!--<div -->
                <!--  v-for="(list, key) in lists" -->
                <!--  :key="key" -->
                <!--  class="lists">-->
                <!--  <div class="list-wrapper">-->
                <!--    <draggable -->
                <!--      :options="{group:'group', animation: 150}" -->
                <!--      class="draggable"-->
                <!--      @start="draggableStart"-->
                <!--      @end="drag=draggableEnd">-->
                <!--      <div -->
                <!--        v-for="song in list" -->
                <!--        :key="song.id"-->
                <!--        class="list" >-->
                <!--        {{ song.song_name }}-->
                <!--      </div>-->
                <!--    </draggable>-->
                <!--  </div>-->
                <!--</div>-->
              <!--</div>-->
              
             
            
            
    </div>
</template>


<script>
    export default {
        // 外部から値を渡したいとき
        props: ["songs"],
        // props: {
        //     songs: Array
        // },
        
        data(){
            console.log(this.songs);
            return {}
        },
        
        methods: {
            // doDelete: function(song, index){
            //   this.items.splice(index, 1);
            // },
            
            
            
            // お気に入りから外す
            deleteData: function(id) {
            //   axios.delete('https://my-json-server.typicode.com/json/posts/' + result.id)
            
            axios.delete("http://a31093e8b14a4ad5b22fc0d062687d58.vfs.cloud9.us-east-1.amazonaws.com/songs/"+id+"/unfavorite")
            
            //  window.location.reload()
              
            //   .then(response => {
            //     this.result.splice(id, 1)
            //     // console.log(this.result);
            //   })
            
            .then(response => {
                // this.song.splice(id, 1)
                console.log(this.song);
                alert("お気に入りを解除しました。");
                window.location.reload()
            })
            
            //chachでエラーの挙動を定義
            .catch(function (error) {
                console.log(error);
                alert("お気に入り解除が失敗しました。");
            });
              
            // .then((res)=>{
            //     this.song = res.data
            // })
            
             },
            
            
            // axios.delete(this.endpoint(),{
            //     params: {
            //         id: id
            //     } 
            // }).then(response => {
            //     this.getAll();
            // }).catch(function(err){
            //     console.log(err);
            // });
            
            
            // 曲の並び替え完了後。順番をデーターべースに保存する
            onEnd: function(originalEvent){
                //originalEventは イベントを取得できる
                // console.log(ソングスの配列の中身)
                // axios.post(...)
            },
            
            
            
            
            // // 曲詳細画面へ移動する
            // // getData: function(song) {
            // getData: function(id) {
            // //   axios.delete('https://my-json-server.typicode.com/json/posts/' + result.id)
            
            // axios.get("http://a31093e8b14a4ad5b22fc0d062687d58.vfs.cloud9.us-east-1.amazonaws.com/songs/{song}", {song: "song"})
            // // axios.get("http://a31093e8b14a4ad5b22fc0d062687d58.vfs.cloud9.us-east-1.amazonaws.com/songs/"+id)
            
            
            // //thenで成功した場合
            // // .then(function (response) {
            // //     console.log(response);
            // // })
            // .then(response => {
            //     this.song = response.data
            //     console.log(response);
            // })
            
            // //chachでエラーの挙動を定義
            // .catch(function (error) {
            //     console.log(error);
            // });
              
              
            // // .then(response => {
            // //     this.song.splice(id, 1)
            // //     console.log(this.song);
            // // });
            // }
            
          }
    }
</script>