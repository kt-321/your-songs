<template>
    <div id="followings-component">
        
        <!--以下は成功分-->
            <div class="list-wrapper">
                <draggable v-bind="{group: 'users', animation: 200, delay: 30}" tag="ul" class="list-unstyled">
                    <div v-for="user, index in users" :key="user.name" class="list">
                        <ul class="list-unstyled">
                            <li>{{ user.id }}</li>
                            <li>{{ user.name }}</li>
                            <li v-if="user.age">{{ user.age }}代</li>
                            
                            <li v-if="user.gender == 1">男性</li>
                            <li v-else-if="user.gender == 2">女性</li>
                            
                            
                            <li v-if="user.favorite_music_age">{{ user.favorite_music_age }}年代</li>
                            
                            <button class="delete-button btn btn-primary" v-on:click="deleteData(user.id)">フォローを外す</button>
                            
                            <button class="btn btn-success" v-on:click="getData(user.id)">プロフィール</button>
                        </ul>
                    </div>
                </draggable>
            </div>
            
            
            
    </div>
</template>


<script>
    export default {
        
        props: ["users"],
        
        data(){
            console.log(this.users);
            return {}
        },
        
        methods: {
            
            
            // フォローを解除する
            deleteData: function(id) {
            
            axios.delete("http://a31093e8b14a4ad5b22fc0d062687d58.vfs.cloud9.us-east-1.amazonaws.com/users/"+id+"/unfollow")
            
            .then(response => {
                console.log(this.user);
                alert("フォローを解除しました。");
                window.location.reload()
            })
            
            //chachでエラーの挙動を定義
            .catch(function (error) {
                console.log(error);
                alert("フォローの解除に失敗しました。");
            });
             
            
             },
            
            
            
            // ユーザープロフィール画面へ移動する
            getData: function(id) {
            axios.get("http://a31093e8b14a4ad5b22fc0d062687d58.vfs.cloud9.us-east-1.amazonaws.com/users/"+id)
            
            .then(response => {
                this.user = response.data
                console.log(response);
            })
            
            //chachでエラーの挙動を定義
            .catch(function (error) {
                console.log(error);
            });
              
              
            }
            
          }
    }
</script>