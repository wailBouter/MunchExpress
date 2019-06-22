<template>
    <div class="row">
        <div class="col-md-7">
            <h3>Customer details</h3>
            <order-form></order-form>
            <h3>Order details <span class="float-right" v-if="finalAmount > 0">{{finalAmount}}</span> <h6 v-else>You have no orders yet</h6></h3> 
            <order-details :orderDetails="orders"></order-details>
        </div>
        <div class="col-md-5">
            <h3>Menu</h3>
            <order-menu-items :menus="menuItems"></order-menu-items>
        </div>
    </div>
</template>

<script>
import OrderForm from './OrderAddForm';
import OrderMenuItems from './OrderMenuItems';
import OrderDetails from './OrderDetails';
import axios from 'axios';
export default {
    props: ['restoId'],
    components:{ OrderForm, OrderMenuItems, OrderDetails},
    created(){
        this.loadRestoMenuItems();
        window.eventBus.$on('addMenuEvent', this.handleAddMenu);
        window.eventBus.$on('filteredList', this.handleFilteredList);
        window.eventBus.$on('clearedList', this.handleClearedList);

    },
    data() {
        return{
            OriginalMenuItems: [],
            menuItems: [],
            orders: []
        }
    },
    computed: {
        finalAmount() {
            let total = 0;
            this.orders.forEach(order => total = total + order.price);
            return total;
        }
    },
    methods: {
        loadRestoMenuItems(){
            let postData = {restoId: this.restoId};
            axios.post('/api/resto/menu', postData)
            .then(response => { 
                this.menuItems = response.data;
                this.OriginalMenuItems = response.data;

                })
            .catch(error => console.log('error', error.response))

        },
        handleAddMenu(menu){
            this.orders.unshift(menu);
        },
        handleFilteredList(filterdList) {
            this.menuItems = filterdList;
        },
        handleClearedList() {
            this.menuItems = this.OriginalMenuItems
        }
    }
}
</script>

<style>

</style>
