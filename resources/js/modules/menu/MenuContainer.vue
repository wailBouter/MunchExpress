<template>
    <div class="wrapper menu__container">
        <div class="row">
            <div class="col-md-8">
                <card-component>
                    <template slot="title">My Menu Items</template>
                    <template slot="body">
                        <div class="section">
                            <multiselect 
                            v-model="menu"
                            :options="categories">
                            </multiselect>
                        </div>
                        <MenuGroup :items = currentMenuItems></MenuGroup>
                    </template>
                </card-component>
            </div>
            <div class="col-md-4">
                <card-component>
                    <template slot="title">Add Menu Item</template>
                    <template slot="body">
                        <MenuAddForm :categories ="categories" :resto-id="restoId" v-on:NewMenuItemAdded="handleNewMenuItem"></MenuAddForm> 
                    </template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>
import _ from 'lodash';
import Multiselect from 'vue-multiselect';
import MenuGroup from './MenuGroups';
import MenuAddForm from './MenuAddForm';
export default {

    components: {
        Multiselect, MenuGroup, MenuAddForm
    },
    
    props:['items', 'restoId'],

    created() {
        _.forEach(this.items, (item, key) => {
            this.categories.push(key);
        });
        this.menu = this.categories[0];
        this.localItems = this.items;
    },

    data() {
        return {
            localItems: '',
            menu: '',
            categories: []
        }
    },

    computed: {
        currentMenuItems() {
            return this.localItems[this.menu];
        }
    },

    methods: {
        handleNewMenuItem(item, category) {
            console.log(item);
            this.localItems[category].unshift(item);
        }
    }

}
</script>

<style>

</style>
