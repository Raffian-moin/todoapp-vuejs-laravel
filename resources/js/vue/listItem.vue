<template>
<div class="items">
    <input
    type="checkbox"
    @change="updateCheck()"
    v-model="item.completed"
    >
    <span :class="[item.completed ? 'completed' : '','itemText']">{{item.name}}</span>
    <button @click="removeItem()" class="trashCan">
        <font-awesome-icon icon="trash"/>
         </button>
</div>
</template>

<script>

export default{
    name:"ListItem",
    props:['item'],
    methods:{
        updateCheck(){
            axios.put('/item/'+this.item.id, {
            item:this.item
        })
        .then(response=> {
           if(response.status==200){
               this.$emit('itemChanged');
           }
        })
        .catch(function (error) {
            console.log(error);
        });
        },
        removeItem(){
            axios.delete('/item/'+this.item.id)
        .then(response=> {
           if(response.status==200){
               this.$emit('itemChanged');
           }
        })
        .catch(function (error) {
            console.log(error);
        });
        }
    }


}

</script>

<style>

.completed{
    text-decoration:line-through;
    color:#999999;
}
.itemText{
    width:100%;
    margin-left:20px;
}
.item{
    display:flex;
    justify-content: center;
    align-items:center;
}
.trashCan{
    background: #e6e6e6;
    border:none;
    color:#ff0000;
    outline:none;
}

</style>