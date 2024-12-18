<template>
    <div>
      <div class="row-nav">
        <div class="browse-categories">
          <FirsApp/>
          <span>Browse All Categories</span>
          <i class="fa-solid fa-chevron-down"></i>
        </div>
        <RouterLink to="/categories" class="routerLink">
          <div class="icon-name-hot">
            <Hot/>
            <span>Hot Deals</span>
          </div>
        </RouterLink>
        <div class="nav">
          <a href="">Home</a>
          <div class="gap-icon">
            <a href="">Food <i class="fa-solid fa-chevron-down"></i></a>
          </div>
          <a href="">Vegetable <i class="fa-solid fa-chevron-down"></i></a>
          <a href="">Drink</a>
          <a href="">Cookies</a>
          <a href="">Meat & Seafood <i class="fa-solid fa-chevron-down"></i></a>
          <a href="">Bakery</a>
        </div>
        <div class="contact">
          <Headphone/>
          <div class="hot-line">
            <div>099 777 888</div>
            <span>24/7 Support Center</span>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import Headphone from '@/assets/icons/Headphone.vue';
import FirsApp from '@/assets/icons/FirsApp.vue';
import Hot from '@/assets/icons/Hot.vue';

export default {
  components: {
    Headphone,   
    FirsApp,
    Hot,

  }
}
</script>

<style scoped>
.row-nav {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 60px;  
  padding: 6px 16px 6px 16px;
}
.browse-categories {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 44px;
  width: 250px;
  background-color: #3BB77E;
  border-radius: 6px;
  gap: 10px;
  font-family: "Quicksand", sans-serif;
  font-weight: 600;
  color: white;
  font-size: 16px;
  cursor: pointer;
}
.icon-name-hot {
  font-family: "Quicksand", sans-serif;
  display: flex;
  align-items: center;
  gap: 20px;
  cursor: pointer;
  font-weight: bold;
  color: black;
}
.nav {
  display: flex;
  flex-direction: row;
  gap: 55px;
  font-family: "Quicksand", sans-serif;
  font-weight: 600;
}
.nav a {
  color: black;
}
.nav a:link {
  text-decoration: none;
}
.hot-line {
  display: flex;
  flex-direction: column;
  align-items: center;
}
.hot-line div {
  font-family: "Quicksand", sans-serif;
  font-size: 24px;
  font-weight: 700;
  color: #3BB77E;
}
.hot-line span {
  font-family: 'Lato';
  font-size: 12px;
  font-weight: 400;
  color: #7E7E7E;
}
.contact {
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 0 0 0 16%;
  gap: 10px;
}
.routerLink {
    text-decoration: none;
}
</style>