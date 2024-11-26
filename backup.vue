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
    />
  </template>
  
  <script>
  import Category_Component from './components/Category_Component.vue';
  import Promotion_Component from './components/Promotion_Component.vue';
  import Menu_Component from './components/Menu_Component.vue';
  import { useProductStore } from './store/productStore';
  import { mapState } from 'pinia';
  
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
      Menu_Component
    },
    methods: {
      getQuantity() {
        return Math.floor(Math.random() * 50);
      }
    },
    data() {
      return {
        groupList: [
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
        }
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





  
  