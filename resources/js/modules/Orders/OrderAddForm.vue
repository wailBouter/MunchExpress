<template>
    <div class="resto_add_form_wrapper">
        <form action="#">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text"
                    class="form-control"
                    v-model="customer.name">
            </div>

            <div class="form-group">
                <label for="name">Phone Number</label>
                <input type="text"
                    class="form-control"
                    v-model="customer.phone">
            </div>

            <div class="form-group">
                <label for="name">Address</label>
                <input type="text"
                    class="form-control"
                    v-model="customer.address">
            </div>

        </form>
    </div>
</template>

<script>
export default {
    data(){
        return{
            customer:{
                name: '',
                phone: '',
                address: ''
            }
        }
    },
    watch: {
        customer: {
            handler(value) {
                let customer = {
                    name: value.name,
                    phone: value.phone,
                    address: value.address
                }
                this.$emit('customerDetailsEvent', customer);
            }, deep: true
        }
    }
}
</script>

<style>

</style>
