
<script setup>
// import { RouterLink, RouterView } from 'vue-router';
</script>

<template>
  <div class="container">
    <template v-for="item in items" key="item">
      <Category_Component 
      :label="item.label"
      :img_src="item.img_src"
      :quantity="item.quantity"
      :background_color="item.background_color"
      :radius_color="item.radius_color" 
      />
    </template>
  </div>

  <div class="container">
    <template v-for="item in promotions" :key="item.label">
      <Promotion_Component 
        :label="item.label"
        :background_color="item.background_color"
        :img_src="item.img_src"
        :button_color="item.button_color"
        :class="{ 'orange-juice-image': item.img_src.includes('Orange juice.png') }"
      />
    </template>
  </div>
</template>

<script>
import Category_Component from './components/Category_Component.vue';
import Promotion_Component from './components/Promotion_Component.vue';

export default {
  components: {
    Category_Component,
    Promotion_Component
  },
  methods: {
    getQuantity() {
      return Math.floor(Math.random() * 50)
    }
  },
  data() {
    return {
      items: [
        {
          label: 'Burger',
          img_src: './src/assets/image/burger-removebg-preview.png',
          quantity: this.getQuantity(),
          background_color: "#fef3c7",
          radius_color: "#fed7aa",
        },
        {
          label: 'Peach',
          img_src: './src/assets/image/Peach.png',
          quantity: this.getQuantity(),
          background_color: "#ffedd5",
          radius_color: "#ffedd5",
        },
        {
          label: 'Oganic Kiwi',
          img_src: './src/assets/image/Kiwi.png',
          quantity: this.getQuantity(),
          background_color: "#dcfce7",
          radius_color: "#dcfce7",
        },
        {
          label: 'Red Apple',
          img_src: './src/assets/image/Red_Apple.png',
          quantity: this.getQuantity(),
          background_color: "#fee2e2",
          radius_color: "#fee2e2",
        },
        {
          label: 'Snacks',
          img_src: './src/assets/image/Snacks.png',
          quantity: this.getQuantity(),
          background_color: "#ccfbf1",
          radius_color: "#ccfbf1",
        },
        {
          label: 'Black plum',
          img_src: './src/assets/image/black_plum.png',
          quantity: this.getQuantity(),
          background_color: "#f3e8ff",
          radius_color: "#f3e8ff",
        },
        {
          label: 'Vegetable',
          img_src: './src/assets/image/Vegetable.png',
          quantity: this.getQuantity(),
          background_color: "#dcfce7",
          radius_color: "#dcfce7",
        },
        {
          label: 'Headphone',
          img_src: './src/assets/image/Headphone.png',
          quantity: this.getQuantity(),
          background_color: "#e2e8f0",
          radius_color: "#e2e8f0",
        },
        {
          label: 'Pancakes',
          img_src: './src/assets/image/Pancakes.png',
          quantity: this.getQuantity(),
          background_color: "#ffe4e6",
          radius_color: "#ffe4e6",
        },
        {
          label: 'Orange',
          img_src: './src/assets/image/Orange.png',
          quantity: this.getQuantity(),
          background_color: "#ffedd5",
          radius_color: "#ffedd5",
        },
        
        
      ],
      promotions: [
        {
          label: 'Everyday Fresh &\nClean with Our\nProducts',
          img_src: './src/assets/image/Onion.png',
          background_color: '#e5e7eb',
          button_color: '#4ade80'
          
        },
        {
          label: 'Make your Breakfast\nHealthy and Easy',
          img_src: './src/assets/image/Orange juice.png',
          background_color: '#ffedd5',
          button_color: '#4ade80'
          
        },
        {
          label: 'The best Organic\nProducts Online',
          img_src: './src/assets/image/Organic products.png',
          background_color: '#dcfce7',
          button_color: '#60a5fa'
          
        },
      ]
      
    }
  }
}
</script>


