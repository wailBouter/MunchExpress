<template>
    <div class="mb-3 wrapper">
        <input type="text" placeholder="Search here..." v-model="searchSring" class="form-control">
    </div>
</template>

<script>
export default {
    props: ['menus'],
    data() {
        return {
            searchSring: ''
        }
    },
    computed: {
        filteredList() {
            return this.menus.filter(menu => {
                return menu.name.toLowerCase().includes(this.searchSring.toLowerCase());
            });
        }
    },
    watch: {
        searchSring (value){
            if(value != '') {
                window.eventBus.$emit('filteredList', this.filteredList);
            }else {
                window.eventBus.$emit('clearedList');
            }
        }
    }
}
</script>

<style>

</style>
