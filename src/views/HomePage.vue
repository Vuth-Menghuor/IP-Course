<template>
    <headerComponent/>
    <div class="body">
        <div class="menu-sec">
            <span class="menu">Menu</span>
            <section class="section">
                <template v-for="(section, index) in menuSections" :key="index">
                    <RouterLink :to="`/page/${$route.params.pageNumber}` + section.link">
                        {{ section.name }}  
                    </RouterLink> 
                </template>
            </section>
            <div class="space">
                <img src="../assets/images/robot-amico.png">
            </div>
        </div>
        <div class="article">
            <RouterView />
            <div class="input-type">
                <p>Message:</p>
                <input type="text" v-model="store.message">
            </div>
        </div>  
    </div>
    <footerComponent/>
</template>

<script>
import footerComponent from '@/components/footerComponent.vue';
import headerComponent from '@/components/headerComponent.vue';
import { useMessageStore } from '@/stores/pageStore';


export default {
    setup() {
        const store = useMessageStore()
        return {
            store,
        }
    },
    components: {
        headerComponent,
        footerComponent,
    },
    data() {
        return {
            menuSections: [
                { name: "Section 1", link: "/section/1"},
                { name: "Section 2", link: "/section/2"},
                { name: "Section 3", link: "/section/3"},
                { name: "Section 4", link: "/section/4"},
            ],
        }
    },
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Quicksand:wght@300..700&family=Rajdhani:wght@300;400;500;600;700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap');

.body {
    display: flex;
    justify-content:space-between;
    align-items: center;
    border: 1px solid black;
    background-color: #F4EDD3;
    font-family: "Roboto Mono", serif;
}
.menu-sec {
    display: flex;
    flex-direction: column;
    width: 20%;
    border: 1px solid black;
    border-left: none;
    border-top: none;
    border-bottom: none;
}
.menu-sec .menu {
    padding: 30px 0px 30px 40px;
    border: 1px solid black;
    border-top: none;
    border-left: none;
    border-right: none;
    font-weight: 500;
    font-size: 18px;
}
.section {
    display: flex;
    flex-direction: column;
    justify-content: center;

}
.section a {
    display: flex;
    justify-content: center;
    text-decoration: none;
    color: black;
    font-weight: 500;
    padding: 30px;
    font-size: 18px;
    border: 1px solid black;
    border-left: none;
    border-right: none;
    border-top: none;
    transition-duration: 0.3s;
}

.section a.router-link-active {
    background-color: #4C585B;
    color: white;
}

.article {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
}
.space {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 20vh;
}
.space > img {
    height: 150px;
    width: auto;
}
.input-type {
    display: flex;
    gap: 20px;
    align-items: center;
}
.input-type > input {
    padding: 10px;
    height: 20px;
    font-size: 16px;
    font-weight: 500;
    background-color: transparent;
    border-radius: 8px;
}
.input-type p {
    font-family: "Roboto Mono", serif;
    font-size: 20px;
    font-weight: 500;
}
</style>
  