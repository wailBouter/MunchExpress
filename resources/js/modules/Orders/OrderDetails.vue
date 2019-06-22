<template>
     <ul class="list-group">
        <li class="list-group-item" v-for="order in orderDetails" :key="order.id">
            {{order.name}}, <small>{{order.category.name}}</small>
            <span class="float-right">{{order.price}}</span>
        </li>
    </ul>
</template>

<script>
export default {
    props: ['orderDetails'],
}
</script>

<style>

</style>
