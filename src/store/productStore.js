import { defineStore } from 'pinia'
import axios from "axios"

export const useProductStore = defineStore('product', {
    state: () => ({
         groups: [],
         promotions: [],
         categories: [],
         products: [],
         currentProductGroup: "All",
    }),
    getters: {
     getCategoriesByGroup(groupName) {
          return (groupName) => this.categories.filter((category) => category.group === groupName)
     },

     getProductsByGroup() {
          return () => {
               if(this.currentProductGroup === "All") 
                    return this.products
               return this.products.filter((product) => product.group === this.currentProductGroup)
          }
     },

     getProductsByCategory(categoryId) {
          console.log("from store")
          console.log(this.currentProductGroup)
          return (categoryId) => this.products.filter((product) => product.categoryId === categoryId)
     },

     getPopularProducts() {
          const countPopular = 10;
          const popular = () => this.products.filter((product) => product.countSold > countPopular)
          return popular
     },

    },
    actions: {
     async fetchCategories() {
          await axios.get("http://localhost:3000/api/categories").then(res => {
            this.categories = res.data;
            
          })
     },

     async fetchPromotions() {
          await axios.get("http://localhost:3000/api/promotions").then(res => {
          this.promotions = res.data;
     })
     },

     async fetchProducts() {
          await axios.get("http://localhost:3000/api/products").then(res => {
          console.log(res.data)
          this.products = res.data;
     })
     },

     async fetchGroups() {
          await axios.get("http://localhost:3000/api/groups").then(res => {
          this.groups = res.data;
     })
     }
    },
  })

