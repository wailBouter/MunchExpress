<template>
    <div class="wrapper">
        <menu-search :menus="menus" :originalMenus="originalMenus"></menu-search>
        <menu-items :menus="menus"></menu-items>
    </div>
</template> 

<script>
import MenuSearch from './MenuSearch'
import MenuItems from './MenuItems'
export default {
    components: {MenuItems, MenuSearch},
    props: ['menus', 'originalMenus']
}
</script>

<style>

</style>
