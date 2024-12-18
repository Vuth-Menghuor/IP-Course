<template>
    <div class="header">
      <div class="name">
        <img src="@/assets/image/melonLogo.png" height="64px" width="82px" />
        <div class="name-logo">
          <div>Melon</div>
          <span>MART & GROCERY</span>
        </div>
      </div>
      <div class="search-header">
        <div class="search-bar">
          <div class="dropdown">
            <div class="dropdown-text" @click="toggleDropdown">
              <span>{{ selectedCategory }}</span>
              <i :class="['fa-solid', 'fa-chevron-down', { rotated: dropdownOpen }]"></i>
            </div>
            <ul v-show="dropdownOpen" class="dropdown-list">
              <li
                v-for="category in categories"
                :key="category"
                class="dropdown-list-item"
                @click="selectCategory(category)">
                {{ category }},
              </li>
            </ul>
          </div>
        </div>
        <div class="search-box">
          <input
            type="text"
            v-model="searchText"
            :placeholder="placeholder"/>
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
      </div>
      <div class="right-header">
        <div class="icon-name">
          <User/>
          <span>Account</span>
        </div>
        <div class="icon-name">
          <Compare/>
          <span>Compare</span>
        </div>
        <div class="icon-name">
          <Wishlist/>
          <span>Wishlist</span>
        </div>
        <div class="icon-name">
          <Cart/>
          <span>Cart</span>
        </div>
      </div>
    </div>
  </template>
  
<script>
import User from '@/assets/icons/User.vue';
import Compare from '@/assets/icons/Compare.vue';
import Wishlist from '@/assets/icons/Wishlist.vue';
import Cart from '@/assets/icons/Cart.vue';

export default {
  components: {
    User,
    Compare,
    Wishlist,
    Cart,
  },
  data() {
    return {
      dropdownOpen: false,
      categories: [
        "All Categories",
        "Food",
        "Vegetable",
        "Drink",
        "Meat & Seafood",
        "Bakery",
      ],
      selectedCategory: "All Categories",
      placeholder: "Search anything...",
      searchText: "", 
    };
  },
  methods: {
    toggleDropdown() {
      this.dropdownOpen = !this.dropdownOpen;
    },
    selectCategory(category) {
      this.selectedCategory = category;
      this.placeholder =
        category === "All Categories"
          ? "Search anything..."
          : `Search in ${category}...`;
      this.dropdownOpen = false;
    },
  },
  watch: {
    dropdownOpen(newValue) {
      if (!newValue) {
        document.addEventListener("click", this.closeDropdown);
      } else {
        document.removeEventListener("click", this.closeDropdown);
      }
    },
  },
  beforeDestroy() {
    document.removeEventListener("click", this.closeDropdown);
  },
};
</script>

<style scoped>
@import url('https://fonts.cdnfonts.com/css/montserrat');
@import url('https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Quicksand:wght@300..700&family=Rajdhani:wght@300;400;500;600;700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap');
.header {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 155px;
  padding: 20px 16px 20px 16px;
}
.header .name {
  display: flex;
  flex-direction: row;
  align-items: end;
  gap: 20px;
}
.name-logo {
  display: flex;
  flex-direction: column;
  align-items: center;
}
.name-logo div {
  font-size: 40px;
  font-family: "Quicksand", sans-serif;
  font-weight: 700;
  color: #3BB77E;
    
}
.name-logo span {
  font-family: 'Montserrat', sans-serif;
  font-size: 10.9px;
  font-weight: 600;
}
.search-header {
  display: flex;
  flex-direction: row;
  align-items: center;
}
.search-bar {
  display: flex;
  align-items: center;
  background-color: white;
  font-family: "Quicksand", sans-serif;
  font-weight: 600;

}
.dropdown {
  position: relative;
  width: 200px;
  border: 1px solid black;
  background-color: white;
  box-shadow: var(--shadow);
  cursor: pointer;
  border: 2px solid #BCE3C9;
  border-radius: 10px 0px 0px 10px;
  border-right: none;
}
.dropdown-text {
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 1rem;
  color: black;
  padding: 1rem 1.5rem;
}
.dropdown-list {
  position: absolute;
  background-color: white;
  border: 2px solid #BCE3C9;
  border-radius: 4px;
  width: 100%;
  list-style-type: none;
  padding: 0;
}
.dropdown-list-item {
  font-size: 14px;
  padding: 16px;
  cursor: pointer;
  transition: margin-left 0.2s ease, color 0.2s ease;
}
.dropdown-list-item:hover {
  margin-left: 0.5rem;
  color: #3BB77E;
}
.search-box {
  display: flex;
  align-items: center;
  width: 100%;
  color: gray;
  border: 2px solid #BCE3C9;
  padding: 0px 17px 0px 0px;
  border-radius: 0px 10px 10px 0px;
}
.search-box input {
  padding: 18px;
  width: 600px;
  font-size: 14px;
  font-weight: 500;
  color: black;
  border: none;
  outline: none;
}
.search-box i {
  font-size: 20.05px;
  cursor: pointer;
}
.right-header {
  display: flex;
  flex-direction: row;
  font-family: 'Lato';
  font-size: 16px;
  font-weight: 400;
  gap: 30px;
  color: gray;
}
.icon-name  {
  display: flex;
  align-items: center;
  gap: 12px;
  cursor: pointer;
  font-family: "Quicksand", sans-serif;

}
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
</style>

