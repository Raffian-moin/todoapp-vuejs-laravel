<template>
<div class="todoListContainer">
<div class="heading">
    <h1 id="title">
        To-do List
    </h1>
    <add-item-form
    v-on:reloadlist="getItems()"/>
    <list-view
    :items="items"
    v-on:reloadlist="getItems()"/>
</div>
    
    <list-view/>
</div>
</template>

<script>

import AddItemForm from './addItemForm'
import ListView from './listView'

export default{
    components:{
        AddItemForm,
        ListView
    },
    data:function(){
        return{
            items:[],
        }
    },
    methods:{
        getItems(){
            axios.get('/item')
            .then(response=>{
               this.items=response.data
            })
            .catch(function (error) {
                console.log(error);
            });

}
        },
        created(){
            this.getItems();
        }
    }



</script>

<style>
.todoListContainer{
    width:350px;
    margin:auto;
}
.heading{
    background: #e6e6e6;
    padding:10px;
}
#title{
    text-align: center;
}
</style>