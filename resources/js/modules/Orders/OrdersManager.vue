<template>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Customer details</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody v-for="order in localOrders" :key="order.id">
            <tr>
                <td>{{order.id}}</td>
                <td>{{order.amount}}</td>
                <td>{{order.isComplete ? 'Completed' : 'Incomplete'}}</td>
                <td>
                    Name: {{order.order_details.customer_name}}
                    <br>
                    Phone: {{order.order_details.customer_phone}}
                    <br>
                    Address: {{order.order_details.customer_address}}
                </td>
                <td v-if="!order.isComplete">
                    <button class="btn btn-sm btn-success" @click="completeOrder(order)">Complete</button>
                    <br>
                    <br>
                    <button class="btn btn-sm btn-warning" @click="cancelOrder(order)">Cancel</button>
                </td>
             </tr>
         </tbody>
    </table>
</template>

<script>
export default {
    props: ['orders'],
    created() {
        this.localOrders = this.orders.data
    },
    data() {
        return {
            localOrders: []
        }
    },
    methods: {
        completeOrder(order) {
             order.isComplete = 1
        },
        cancelOrder(order) {
            this.localOrders = this.localOrders.filter(item => item.id != order.id);
        }
    }
}
</script>

<style>

</style>
