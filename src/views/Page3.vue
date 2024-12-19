<template>
    <headerComponent/>
    <body>
        <div class="body">
            <div class="menu-sec">
                <span class="menu">Menu</span>
                <section class="section">
                    <a href="">Section 1</a>
                    <a href="">Section 2</a>
                    <a href="">Section 3</a>
                    <a href="">Section 4</a>
                    <div class="space"></div>
                </section>
            </div>
            <div class="article">
                <article class="article-sec">
                    <span>Welcome to Page 3</span>
                </article>
            </div>
        </div>
    </body>
    <footerComponent/>
</template>

<script>
import footerComponent from '@/components/footerComponent.vue';
import headerComponent from '@/components/headerComponent.vue';

export default {
    components: {
        headerComponent,
        footerComponent
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Quicksand:wght@300..700&family=Rajdhani:wght@300;400;500;600;700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap');

.body {
    display: flex;
    justify-content:space-between;
    align-items: center;
    border: 1px solid black;
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
}
.article {
    display: flex;
    justify-content: center;
    width: 100%;
}
.article-sec {
    font-size: 20px;
    font-weight: 600;
}
.space {
    height: 20vh;
}
</style>
  