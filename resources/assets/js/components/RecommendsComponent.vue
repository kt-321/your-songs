<template>
    <div id="recommends-component">
        
            <div class="list-wrapper">
                <!--<draggable v-bind="{group: 'songs', animation: 200, delay: 30}" tag="ul" class="list-unstyled" @start="draggableStart" @end="drag=draggableEnd">-->
                <!--<draggable v-bind="{group: 'songs', animation: 200, delay: 30}" tag="ul" class="list-unstyled" @end="onEnd" @change= "onFolderChange">-->
                <draggable v-bind="{group: 'songs', animation: 200, delay: 30}" tag="ul" class="list-unstyled" @end="onEnd">
                    <div v-for="song, index in songs" :key="song.song_name" class="list">
                        <ul class="list-unstyled">
                            <li>{{ song.id }}</li>
                            <li>{{ song.song_name }}</li>
                            <li>{{ song.artist_name }}</li>
                            <li>{{ song.music_age }}年代</li>
                            
                            
                            <li v-if="song.image_url">
                                <img :src="song.image_url" class="song-image img-thumbnail" style="with: 50px; height: 50px;">
                            </li>
                            <li v-else>
                                <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/song.jpeg" class="song-image img-thumbnail" style="with: 50px; height: 50px;">
                            </li>
                            
                            <!--<button class="delete-button btn btn-primary" v-on:click="deleteData(song.id)">削除</button>-->
                            
                            <a :href="`http://a31093e8b14a4ad5b22fc0d062687d58.vfs.cloud9.us-east-1.amazonaws.com/songs/${song.id}`">詳細</a>
                        </ul>
                    </div>
                </draggable>
            </div>
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
            // beforeMove: function(evt) {
            //   return evt.draggedContext.element.name !== 'Meeting';
            // },
            onEnd: function(evt) {
              console.log(evt);
              console.log(evt.srcElement);
              console.log(evt.srcElement.children);
              console.log(evt.srcElement.childNodes);
            //   console.log(evt.srcElement.dataset);
            //   console.log(evt.target);
            //   console.log(evt.from);
              console.log(evt.to);
            //   console.log(evt.oldIndex);
            //   console.log(evt.newIndex);
            //   console.log(evt.clone);
              
            //   alert('Moved!!');
            },
            
            // onUpdate: function(evt) {
            //     console.log(evt);    
            // },
            
            // moved() {
            //     console.log
            // }
            
            // onFolderChange() {
            //     console.log(arguments);
            // }
        }
        
        // methods: {
            
            
            // // 曲を削除する
            // deleteData: function(id) {
            
            // axios.delete("http://a31093e8b14a4ad5b22fc0d062687d58.vfs.cloud9.us-east-1.amazonaws.com/songs/"+id+"/destroy")
           
            
            // .then(response => {
            //     // this.song.splice(id, 1)
            //     console.log(this.song);
            //     alert("曲を削除しました。");
            //     window.location.reload()
            // })
            
            // //chachでエラーの挙動を定義
            // .catch(function (error) {
            //     console.log(error);
            //     alert("曲の削除が失敗しました。");
            // });
             
            //  },
            
            
            
            // 曲の並び替え完了後。順番をデーターべースに保存する
            // onEnd: function(originalEvent){
                //originalEventは イベントを取得できる
                // console.log(ソングスの配列の中身)
                // axios.post(...)
            // },
            
            
        
            
        //   }
    }
</script>