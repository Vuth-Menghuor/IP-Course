<template>
    <div class="container-wrapper">
        <div class="nav-bar">
            <button v-for="(item, index) in navItems" :key="index" class="chevron-right" @click="navigate(item.route)"
            :style="{
                color: item.label === title && item.icon === null ? '#3BB77E': '',
                fontWeight: item.label === title && item.icon === null ? 'bold': ''}">
                {{ item.label }}
                <i v-if="item.icon" :class="item.icon"></i>
            </button>
        </div>
        <div class="image-content">
            <div>
                <div class="image-product">
                    <div class="search-icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="images">
                        <img :src="productImage">
                    </div>
                </div>
                <div class="btn-chevron-image">
                    <div class="arrow-icon" @click="prevItem">
                        <i class="fa-solid fa-arrow-left"></i>                  
                    </div>
                    <div class="grid-container">
                        <img v-for="(image, index) in visibleImages" :key="index" :src="image" @click="upadateProductImage(image)"/>
                    </div>
                    <div class="arrow-icon" @click="nextItem">
                        <i class="fa-solid fa-arrow-right"></i>                  
                    </div>
                </div>
            </div>
            <div class="product-detail">
                <div class="in-stock">In Stock</div>
                <h1 class="title">{{ title }}</h1>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <span>(4.0)</span>
                </div>
                <div class="price">
                    <div class="stan-price">$38</div>
                    <div class="discount-price">
                        <strike>$42</strike>
                    </div>
                </div>
                <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi, quasi, odio minus dolore impedit fuga eum eligendi? Officia doloremque facere quia. Voluptatum, accusantium!</p>
                <div class="Cart">
                    <div class="in-de">
                        <button @click="btnAddClick" v-if="!addClick" class="AddBtn">Add +</button>
                        <input v-else type="number" v-model="amount">
                    </div>
                    <button class="check-in">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Add To Cart</span>
                    </button>
                    <i class="fa-regular fa-heart"></i>
                    <i class="fa-solid fa-shuffle"></i>
                </div>
                <div class="owner-code">
                    <div class="content">
                        <span>Vendor:</span>
                        <span class="gray">NestMart</span>
                    </div>
                    <div class="content">
                        <span>SKU:</span>
                        <span class="gray">FWM15VKT</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-descriptions">
            <nav class="nav">
                <span @click="setActiveTab(index)" v-for="(tab, index) in tabs" :key="index" :class="{active: activeTab === index}">
                    {{ tab }}
                </span>
            </nav>
            <div class="tab-content">
                <span v-if="activeTab === 0">Uninhibited carnally hired played in whimpered dear gorilla koala depending and much yikes off far quetzal goodness and from for grimaced goodness unaccountably and meadowlark near unblushingly crucial scallop tightly neurotic hungrily some and dear furiously this apart</span>
                <span v-if="activeTab === 1">Spluttered narrowly yikes left moth in yikes bowed this that grizzly much hello on spoon-fed that alas rethought much decently richly and wow against the frequent fluidly at formidable acceptably flapped besides and much circa far over the bucolically hey precarious goldfinch mastodon goodness gnashed a jellyfish and one however because. </span>
                <span v-if="activeTab === 2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi magni doloremque repellat distinctio id nulla iusto voluptate repudiandae nobis laudantium ex sit quos totam eum, similique sed amet tempora corrupti.</span>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: {
        title: {
            type: String,
            default: "Empty"
        },
        productImage: {
            type: String,
            default: "undefind",
        }

    },
    data() {
        return {
            navItems: [
                { label: "Home", icon: "fa-solid fa-chevron-right", route:"/"},
                { label: "Categories", icon: "fa-solid fa-chevron-right" },
                { label: this.title, icon: null },
            ],

            images: [
                "../src/assets/image/Orange.png",
                "../src/assets/image/fish.png",
                "../src/assets/image/Peach.png",
                "../src/assets/image/lemon.png",
                "../src/assets/image/corn.png",
                "../src/assets/image/filetFish.png",
                "../src/assets/image/organic.png",
                "../src/assets/image/peppers.png",
                "../src/assets/image/steak.png",
                "../src/assets/image/orangeSweet.png",
                "../src/assets/image/mango.png",
                "../src/assets/image/bacon.png",
            ],
            productImage: '../src/assets/image/Orange.png',

            currentIndex: 0,
            itemsPerPage: 4,

            addClick: false,
            amount: 0,
            tabs: ["Description", "Addtional info", "Review (3)"],
            activeTab: 0

        }
    }, 
    methods: {
        btnAddClick() {
            this.addClick = true
            this.amount = 1
        },
        setActiveTab(index) {
            this.activeTab = index
        },
        navigate(route) {
            if(route) {
                this.$router.push(route)
            }
        },
        prevItem() {
            if (this.currentIndex > 0) {
                this.currentIndex -= this.itemsPerPage;
            }
        },
        nextItem() {
            if (this.currentIndex + this.itemsPerPage < this.images.length) {
                this.currentIndex += this.itemsPerPage;
            }
        },
        upadateProductImage(image) {
            this.productImage = image;
        }

    },
    watch: {
        amount(val) {
            if(val === 0) {
                this.addClick = false
            }
        }
    },
    computed: {
    visibleImages() {
            return this.images.slice(
                this.currentIndex,
                this.currentIndex + this.itemsPerPage
            );
        },
    },
}
</script>

<style scoped>
.container-wrapper{
    padding: 6px 16px 6px 16px;
}
.nav-bar {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 20px 0px 30px 0px;
}
.nav-bar button {
    font-family: 'Lato';
    font-size: 18px;
    color: #7E7E7E;
    width: auto;    
}
.fa-chevron-right {
    position: relative;
    padding: 0px 0px 0px 10px;
    bottom: 2px;
    height: 10px;
    width: 6px;
    color: #B6B6B6;
}  
.image-content {
    display: flex;
    flex-direction: row;
    gap: 10px;
} 
.image-product {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 0px 60px 0px 60px;
    height: 700px;
    width: 48vw;
    border-radius: 20px;
    border: 1px solid #d0d0d0;
}
.images {
    display: flex;
    justify-content: center;
}
.images img {
    height: 100%;
    width: auto;
}
.product-detail {
    display: flex;
    flex-direction: column;
    padding: 20px;
    height: 800px;
    width: 50vw;
}
.grid-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;  
}
.grid-container img {
    border-radius: 20px;
    height: 120px;
    width: 150px;
    cursor: pointer;
    transition: all 0.5s ease;
    outline: 2px solid transparent;
    border: 1px solid #d0d0d0;
}
.grid-container img:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transform: scale(1.05);
}
.grid-container img:focus {
    outline: none;
    box-shadow: 0 0 10px #3BB77E;
}
.btn-chevron-image {
    display: flex;
    justify-content: center;
    padding-top: 30px;
    align-items: center;
    gap: 20px;
}
.search-icon {
    position: relative;
    bottom: 30px;
    left: 55rem;
    /* display: flex; */
    /* justify-content: end; */
    font-size: 25px;
    color: #B6B6B6;
    cursor: pointer;
}
.arrow-icon {
    display: flex;
    justify-content: center;
    align-items: center;
    border: none;
    background-color: #F2F3F4;
    color: #7E7E7E;
    padding: 8px 16px 8px 16px;
    border-radius: 16px;
    transition-duration: 0.4s;
    cursor: pointer;
}
.arrow-icon:hover {
    color: white;
    background-color: #3BB77E;
}
.in-stock {
    background-color: #DEF9EC;
    padding: 8px 14px 8px 10px;
    width: 4vw;
    border-radius: 4px;
    font-family: "Quicksand", sans-serif;
    font-size: 16px;
    font-weight: 700;
    color: #3BB77E;
}
.title {
    font-family: "Quicksand", sans-serif;
    font-size: 40px;
    color: #253D4E;
    font-weight: 700;
    width: 30vw;

}
.rating {
    display: flex;
    text-align: center;
}
.rating span {
    font-family: 'Lato';
    color: #7E7E7E;
    font-size: 14px;
    margin-left: 10px;
}
.fa-star {
    color: #FDC040;
}
.price {
    display: flex;
    align-items: end;
    gap: 50px;
    padding-top: 30px;
    font-family: "Quicksand", sans-serif;
}
.stan-price {
    color: #3BB77E;
    font-size: 72px;
    font-weight: 700;
}
.discount-price {
    color: #B6B6B6;
    font-size: 40px;
    margin-bottom: 12px;
    font-weight: 600;
}
.description {
    color: #7E7E7E;
    font-family: 'Lato';
    font-size: 18px;
    width: 44rem;
    line-height: 1.8rem;
}
.in-de {
    display: flex;
    align-items: center;
}
.AddBtn {
    color: white;
    font-family: "Quicksand", serif;
    background-color: #3BB77E;
    font-size: 20px;
    font-weight: 700;
    height: 56px;
    border: 2px solid #3BB77E;
    width: 130px;
    border-radius: 10px;
}
.in-de input{
    display: flex;
    text-align: center;
    height: 50px;
    width: 120px;
    border: 2px solid #3BB77E;
    border-radius: 10px;
    font-size: 20px;
    color: #3BB77E;
}
.in-de input[type=number]:focus {
    height: 50px;
    width: 120px;
    color: #3BB77E;
    border: 2px solid #3BB77E;
    border-radius: 10px;
    outline: none;
}
.check-in {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    height: 56px;
    width: 180px;
    border-radius: 8px;
    background-color: #3BB77E;
    padding: 0px 20px 0px 20px;
}
.check-in span {
    color: white;
    font-family: "Quicksand", serif;
    font-size: 18px;
    font-weight: 600;
}
.fa-cart-shopping {
    color: white;
}
.Cart {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10px;
    padding-top: 50px;
}
.fa-heart {
    font-size: 20px;
    color: #B6B6B6;
    margin-left: 20px;
    cursor: pointer;
}
.fa-shuffle {
    font-size: 20px;
    color: #B6B6B6;
    margin-left: 20px;
    cursor: pointer;
}
.content {
    display: flex;
    align-items: center;
    justify-content: start;
    gap: 30px;
    font-family: 'Lato';
    padding-top: 10px;
    font-size: 18px;
}
.content .gray {
    color: gray;
}
.owner-code {
    padding: 50px 0px 0px 10px;
}
.nav {
    display: flex;
    gap: 200px;
    padding: 100px 0px 0px 190px;
}
.nav span {
    cursor: pointer;
    text-decoration: none;
    color: #B6B6B6;
    font-family: "Quicksand", serif;
    font-weight: 700;
    font-size: 18px;
}
.nav span.active {
    font-weight: bold;
    color: #3BB77E;
}
.tab-content {
    padding: 20px 0px 50px 140px;
    width: 60vw;
    font-family: 'Lato';
    color: #7E7E7E;
    font-weight: 400px;
    font-size: 16px;
    line-height: 30px;
}
</style>