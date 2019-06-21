<template>
    <div class="resto_add_form_wrapper">
        <form action="#">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text"
                    class="form-control"
                    v-bind="customer.name">
            </div>

            <div class="form-group">
                <label for="name">Phone Number</label>
                <input type="text"
                    class="form-control"
                    v-bind="customer.phone">
            </div>

            <div class="form-group">
                <label for="name">Address</label>
                <input type="text"
                    class="form-control"
                    v-bind="customer.address">
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
    }
}
</script>

<style>

</style>
