
<template>
    <div class="container-wrapper">
        <div class="page-header">
            <img :src="backgroundImages[0]" class="img1">
            <img :src="backgroundImages[1]" class="img2">
            <div class="title-section">
                <div class="title">{{ title }}</div>
                <div class="nav-bar">
                    <button v-for="(item, index) in navItems" :key="index" class="chevron-right" @click="navigate(item.route)">
                        {{ item.label }}
                        <i v-if="item.icon" :class="item.icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>    
export default{
    props: {
        backgroundImages: {
            type: Array,
            default: [
                "/src/assets/image/bgAsset.png",
                "/src/assets/image/bgAsset1.png",
            ]
        },
        title: {
            type: String,
            default: "Empty",
        },
        home: {
            type: String,
            default: "Home",
        },
        
    },

    data() {
        return {
            navItems: [
                { label: this.home, icon: "fa-solid fa-chevron-right", route:"/"},
                { label: "Categories", icon: "fa-solid fa-chevron-right" },
                { label: this.title, icon: null },
            ],

        }
    },

    methods: {
        navigate(route) {
            if(route) {
                this.$router.push(route)
            }
        }
    }
}
</script>

<style scoped>

.container-wrapper{
    padding: 6px 16px 6px 16px;
}
.page-header {
    height: 350px;
    width: auto;
    border-radius: 20px;
    background-color: #3BB77E33;
}
.page-header .img1 {
    position: absolute;
    z-index: -1;
    width: auto;
    height: 310px;
    left: 580px;
    top: 215px; 
}
.page-header .img2 {
    position: absolute;
    z-index: -1;
    height: 310px;
    width: auto;
    top: 215px; 
    left: -200px;

}
.title-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 20%;
    padding: 70px 0px 0px 100px;

}
.title {
    font-family: "Quicksand", sans-serif;
    font-size: 48px;
    font-weight: 700;
    color: #253D4E;
}
.nav-bar {
    display: flex;
    align-items: center;
    gap: 20px;

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
</style>