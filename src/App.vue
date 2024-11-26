<template>
  <Menu_Component
  :title="'Feature Categories'"
  :navList="groupList"
  />
  <div class="container">
    <template v-for="item in Categories" :key="item">
      <Category_Component 
        :label="item.name"
        :img_src="item.image"
        :quantity="item.productCount"
        :background_color="item.color"
      />  
    </template>
  </div>

  <div class="container">
    <template v-for="item in Promotions" :key="item">
      <Promotion_Component 
        :label="item.title"
        :background_color="item.color"
        :img_src="item.image"
        :button_color="item.buttonColor"
      />
    </template>
  </div>

  <Menu_Component
  :title="'Popular Products'"
  :navList="groupList"
  @change-nav="changeProductGroup"
  />

  <div class="productList">
    <template v-for="item in productsByGroup" :key="item">
      <Product_Component
      :name="item.name"
      :price="item.price"
      :percentage="item.promotionAsPercentage"
      :imgPath="item.image"
      :rating="item.rating"
      :size="item.size"
      :countSold="item.countSold"
      :instock="item.instock"
      />
    </template>
  </div>

</template>

<script>
import Category_Component from './components/Category_Component.vue';
import Promotion_Component from './components/Promotion_Component.vue';
import Menu_Component from './components/Menu_Component.vue';
import { useProductStore } from './store/productStore';
import { mapState } from 'pinia';
import Product_Component from './components/Product_Component.vue';

export default {
  setup() {
    const store = useProductStore();
    return {
      store,
    };
  },
  components: {
    Category_Component,
    Promotion_Component,
    Menu_Component,
    Product_Component
  },
  methods: {
    getQuantity() {
      return Math.floor(Math.random() * 50);
    },

    changeProductGroup(nav) {
      this.store.currentProductGroup = nav 
    }

  },
  data() {
    return {
      groupList: [
        "All",
        "Milks & Dairies",
        "Coffes & Teas",
        "Pet Foods",
        "Meats", 
        "Vegetable",
        "Fruits"
      ]
    };
  },
  computed: {
    ...mapState(useProductStore, {
      Categories: "categories",
      Promotions: "promotions",
      Products: "products",
      groups: "groups",
      categories(store) {
        const cats = store.getCategoriesByGroup(this.currentGroupName);
        console.log("Categories by group name");
        console.log(cats);
        return cats;
      },
      popularProducts(store) {
        const products = store.getPopularProducts();
        console.log("Popular products");
        console.log(products);
        return products;
      },
      productsByGroup(store) {
        return store.getProductsByGroup()
      },
    })
  },
  async mounted() {
    await Promise.all([
      this.store.fetchCategories(),
      this.store.fetchPromotions(),
      this.store.fetchProducts(),
      this.store.fetchGroups()
    ]);
  }
};
</script>


<style scoped>
  .productList {
    display: grid;
   grid-template-columns: repeat(5, 1fr);
   grid-template-rows: repeat(2, auto);
   gap: 20px 0px;
  }
</style>





