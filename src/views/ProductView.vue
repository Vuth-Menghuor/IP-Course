<script>
import MenuItem from '@/components/MenuItem.vue';
import ProductImage_Component from '@/components/ProductImage_Component.vue';
import SearchBox_Component from '@/components/SearchBox_Component.vue';
import { useProductStore } from '@/store/productStore';
import { mapState } from 'pinia';
export default {
    setup() {
        const store = useProductStore();

        return {
            store,
        }
    },
    components: {
        SearchBox_Component,
        MenuItem,
        ProductImage_Component
    },
    props: ["productId"],
    computed: {
        ...mapState(useProductStore, {
            products: "products", 
        }),

        product() {
            console.log(this.products[this.productId-1].image)
            return this.products[this.productId-1];
        }
    }

}
</script>
    
<template>
    <SearchBox_Component/>
    <MenuItem/>
    <ProductImage_Component
    :title="product.name"
    :product-image="'.' + product.image"
    />
</template>
