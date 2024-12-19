<template>
    <header>
        <div class="header">
            <span>Header</span>
            <div class="link">
                <button v-for="page in pages" :key="page.name">
                    <router-link 
                        :to="page.link" 
                        :class="{ active: isActive(page.link) }">
                        {{ page.name }}
                    </router-link>
                </button>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: "DynamicHeader",
    data() {
        return {
            pages: [
                { name: "Page1", link: "/page1" },
                { name: "Page2", link: "/page2" },
                { name: "Page3", link: "/page3" },
            ],
        };
    },
    methods: {
        isActive(link) {
            return this.$route.path === link;
        }
    }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Quicksand:wght@300..700&family=Rajdhani:wght@300;400;500;600;700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap');

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 50px;
    color: black;
    border: 1px solid black;
    border-bottom: none;
}
.link {
    display: flex;
    gap: 20px;
}
.link button {
    padding: 10px;
    border: none;
    background-color: white;
}
span {
    font-size: 20px;
    font-weight: 600;
    font-family: "Roboto Mono", serif;
}
a {
    font-family: "Roboto Mono", serif;
    text-decoration: none;
    color: black;
    font-size: 20px;
    font-weight: 600;
}

a.active {
    color: red; 
    font-weight: 700;
}
</style>
