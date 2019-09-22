<!--<template>-->
<!--    <div id="recommended-songs-component">-->
                
<!--                <div  v-for="list in recommendedSongs" :key="key" class="lists">-->
<!--                    <div class="list-wrapper">-->
<!--                        <draggable :options="{group: 'recommendedSongs'}" element="ul" class="list-unstyled">-->
                            <!--<div v-for="song in list" :key="song.id" class="list">{{song.music_age}}-{{song.artist_name}}-{{song.song_name}}-(No.{{song.id}})</div>-->
                            <!--<div v-for="song in list" class="list">{{ $recommended_song->name }}</div>-->
                            <!--<div v-for="song in list" :key="song.id" class="list">{{ song.name }}-{{ song.artist_name }}</div>-->
                            <!--<div v-for="song in list" :key="song.name" class="list">{{ song.name }}-{{ song.artist_name }}</div>-->
<!--                            <div v-for="song in list" class="list">{{ song.song_name }}-{{ song.artist_name }}</div>-->
<!--                        </draggable>-->
<!--                    </div>-->
<!--                </div> -->
                
            
<!--    </div>-->
<!--</template>-->

<script>
    export default {
        // 外部から値を渡したいとき
        props: ["recommendedSongs"],
        
        data: function(){
            console.log(this.recommendedSongs);
           
        }
    }
</script>
