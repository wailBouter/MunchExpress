<template>
    <div class="mb-3 wrapper">
        <input type="text" placeholder="Search here..." v-model="searchSring" class="form-control">
    </div>
</template>

<script>
export default {
    props: ['menus', 'originalMenus'],
    created() {
        this.localMenus = this.menus;
    },
    data() {
        return {
            localMenus: [],
            searchSring: ''
        }
    },
    computed: {
        filteredList() {
            this.localMenus = this.originalMenus;
            return this.localMenus.filter(menu => {
                return menu.name.toLowerCase().includes(this.searchSring.toLowerCase());
            });
        }
    },
    watch: {
        searchSring (value){
            window.eventBus.$emit('filteredList', this.filteredList);
        }
    }
}
</script>

<style>

</style>
