<template>
   <div>
       <div class="row mb-3">
            <div class="col-md-12">
                <button class="btn btn-success float-right" @click="handleOrderSave">Save</button>
               </div>
       </div>
        <div class="row">
            <div class="col-md-7">
                <h3>Customer details</h3>
                <order-form @customerDetailsEvent="handleCustomerDetails"></order-form>
                <h3>Order details <span class="float-right" v-if="finalAmount > 0">{{finalAmount}}</span> <h6 v-else>You have no orders yet</h6></h3> 
                <order-details :orderDetails="orders" @removeOrderEvent="handleOrderRemove"></order-details>
            </div>
            <div class="col-md-5">
                <h3>Menu</h3>
                <order-menu-items :menus="menuItems" :originalMenus="OriginalMenuItems"></order-menu-items>
            </div>
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
    },
    data() {
        return{
            OriginalMenuItems: [],
            menuItems: [],
            orders: [],
            customerDetails: null
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
        loadRestoMenuItems() {
            let postData = {restoId: this.restoId};
            axios.post('/api/resto/menu', postData)
            .then(response => { 
                this.menuItems = response.data;
                this.OriginalMenuItems = response.data;

                })
            .catch(error => console.log('error', error.response))

        },
        handleAddMenu(menu) {
            this.orders.unshift(menu);
        },
        handleFilteredList(filterdList) {
            this.menuItems = filterdList;
        },
        handleCustomerDetails(customer) {
            this.customerDetails = customer;
        },
        handleOrderRemove(order){
            this.orders = this.orders.filter(item => item.id != order.id);
        },
        handleOrderSave() {
            let ordersIds = [];
            this.orders.forEach(order => {
                ordersIds.push(order.id);
            });
            let orderInfos = {
                resto_id: this.restoId,
                order_data: {
                    customerDetails: this.customerDetails,
                    totalPrice: this.finalAmount,
                    orders: ordersIds
                }
            }
            console.log('saved', orderInfos);
            axios.post('/api/order/save', orderInfos)
            .then(response => console.log('response', response.data))
            .catch(error => console.log('error', error.data));
        }
    }
}
</script>

<style>

</style>
