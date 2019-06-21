<template>
    <ul class="list-group">
        <li class="list-group-item" v-for="menu in menus" :key="menu.id">
           <div class="row">
               <div class="col-md-10">
                    {{menu.name}}
                    <span class="float-right">{{menu.price}}</span>
                    <br>
                    <small>{{menu.category.name}}</small>
               </div>
               <div class="col-md-2">
                   <button class="btn btn-primary btn-sm">Add</button>
               </div>
           </div>
        </li>
    </ul>
</template> 

<script>
export default {
    props:['menus']

}
</script>

<style>

</style>
