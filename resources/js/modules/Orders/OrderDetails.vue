<template>
     <ul class="list-group">
        <li class="list-group-item" v-for="order in orderDetails" :key="order.id">
            {{order.name}}, <small>{{order.category.name}}</small>
            <span class="float-right">
                {{order.price}}
                <span class="pointer ml-3" @click="removeOrder(order)">X</span>
            </span>
        </li>
    </ul>
</template>

<script>
export default {
    props: ['orderDetails'],
    methods: {
       removeOrder(order) {
           this.$emit('removeOrderEvent', order);
       }
    }
}
</script>

<style scoped>
.pointer{
    cursor: pointer;
}

</style>
