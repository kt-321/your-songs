<template>
    <div id="favorite-component">
        
                <!--<div  v-for="list in favoriteItems" :key="key" class="lists">-->
                <!--    <div class="list-wrapper">-->
                <!--        <draggable :options="{group: 'favoriteItems'}" element="ul" class="list-unstyled">-->
                <!--            <div v-for="favorite in list" :key="favorite.song_name" class="list">{{favorite.song_name}}-{{favorite.artist_name}}</div>-->
                <!--        </draggable>-->
                <!--    </div>-->
                <!--</div>-->
                    
                
                <ul>
                    <li v-for="song in songs" :key="song.song_name">
                        <dt>Title</dt>
                        <dd>{{song.song_name}}</dd>
                        <dt>Artist</dt>
                        <dd>{{song.artist_name}}</dd>
                    </li>
                </ul>
    </div>
</template>


<script>
    export default {
        // 外部から値を渡したいとき
        // props: ["songs"],
        props: {
            songs: Array
        },
        
        
        
        // data: function(){
        //     console.log(this.songs);
        //     return {}
        // },
        
        data(){
            console.log(this.songs);
            return {}
        },
        
        created: function () {
            console.log(this.songs)
        }
    }
</script>