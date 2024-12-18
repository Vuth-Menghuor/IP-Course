<script >
import MenuItem from '@/components/MenuItem.vue';
import PageHeader_Component from '@/components/PageHeader_Component.vue';
import SearchBox_Component from '@/components/SearchBox_Component.vue';
export default {
    components: {
        SearchBox_Component,
        MenuItem,
        PageHeader_Component
    },
    props: ["categoryTitle"]
}
</script>

<template> 
    <SearchBox_Component/>
    <MenuItem/>
    <PageHeader_Component 
    :title="categoryTitle"
    />
</template>