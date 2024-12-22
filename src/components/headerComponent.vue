<template>
    <header>
        <div class="header">
            <span>Header</span>
            <div class="link">
                <button v-for="page in pages" :key="page.name">
                    <router-link 
                        @click="passMessage()"
                        :to="page.link">
                        {{ page.name }}
                    </router-link>
                </button>
            </div>
        </div>
    </header>
</template>

<script>
import { useMessageStore } from '@/stores/pageStore';

export default {
    name: "DynamicHeader",
    setup() {
        const store = useMessageStore()
        return {
            store,
        }
    },
    data() {
        return {
            pages: [
                { name: "Page1", link: "/page/1" },
                { name: "Page2", link: "/page/2" },
                { name: "Page3", link: "/page/3" },
            ],
            message: "",
        };
    },
    methods: {
        passMessage() {
            console.log("hello")
            this.store.lastPage = this.curPage;
            this.store.pages[this.curPage] = this.store.message; 
            this.store.message = ""; 
        },
    },
    computed: {
        curPage() {
            return this.$route.params.pageNumber
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
    color: white;
    border: 1px solid #4C585B;
    border-bottom: none;
    border-radius: 10px 10px 0px 0px;
    background-color: #4C585B;
}
.link {
    display: flex;
    gap: 20px;
}
.link button {
    padding: 10px;
    border: none;
    color: white;
    background-color: #4C585B;
}
span {
    font-size: 20px;
    font-weight: 600;
    font-family: "Roboto Mono", serif;
}
a {
    font-family: "Roboto Mono", serif;
    text-decoration: none;
    color: white;
    font-size: 20px;
    font-weight: 600;
    transition-duration: 0.2s;
}

a.router-link-active {
    color:black; 
    font-weight: bolder;
    
}
</style>
