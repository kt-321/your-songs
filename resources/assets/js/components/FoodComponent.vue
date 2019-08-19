<template>
    <div id="food-component">
        <!--<ul class="list-unstyled">-->
            <!--<li v-for="food in foodItems" :key="food.no, food.name">{{food.name}}-(No.{{food.no}})</li>  -->
            <!--<draggable element="ul" class="list-unstyled">-->
            
            
                
                <!--<draggable :options="{group: 'foodItems'}" element="ul" class="list-unstyled" v-for="list in foodItems">-->
                <!--    <li v-for="food in list" :key="food.no">{{food.name}}-(No.{{food.no}})</li>-->
                <!--</draggable>-->
                
                
                <div  v-for="list in foodItems" :key="key" class="lists">
                    <div class="list-wrapper">
                        <draggable :options="{group: 'foodItems'}" element="ul" class="list-unstyled">
                            <div v-for="food in list" :key="food.no" class="list">{{food.name}}-(No.{{food.no}})</div>
                        </draggable>
                    </div>
                </div>
            
            
            
        <!--</ul>-->
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
            foodItems:[
                [{no:1, name:'キャベツ'},{no:2, name:'ステーキ'}, {no:3, name:'リンゴ'}],
                [{no:4, name:'玉葱'}, {no:5, name:"卵"}, {no:6, name:'パプリカ'}],
                [{no:7, name:'ハム'}, {no:8, name:"豆"}, {no:9, name:'ヨーグルト'}],
                
            ]
            }
        }
    }
</script>
