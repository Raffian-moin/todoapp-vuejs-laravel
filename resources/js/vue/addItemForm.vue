<template>
<div class="additem">
<input type="text" v-model="item.name"
 placeholder="write here">
<font-awesome-icon
@click="addItem()"
:class="[item.name?'active':'inactive','plus']"
icon="plus-square"
/>
</div>
</template>

<script>

export default{
    name:"AddItemForm",
    data:function(){
        return{
            item:{
                name:"",
            }
        }
    },
    methods:{
        addItem(){
            if(this.item.name == ""){
                return;
            }else{
                axios.post('/item', {
                    item:this.item
                })
                .then(response => {
                    if(response.status == 201){
                        this.item.name = "";
                        this.$emit('reloadlist');
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
            }
            
    }
}

</script>

<style>

.additem{
    display:flex;
    justify-content:center;
    align-items: center;
}

input{
    background: #f7f7f7;
    border:0px;
    outline:none;
    padding:5px;
    margin-right: 10px;
    width:100%;
}
.plus{
    font-size: 20px;
}
.active{
    color:#00CE25;
}
.inactive{
    color:#999999;
}

</style>