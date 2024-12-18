<template>
    <div class="show-case">
        <div class="bg-show-case">
            <img :src="bgImage" :width="bgImageWidth"/>
            <div class="section">
                <div class="title">{{ title }}</div>
                <span>{{ subTitle }}</span>
                <div class="subscribe">
                    <div class="icon-input">
                        <PaperPlane/>
                        <input v-model="email" type="text" :placeholder="inputPlaceholder">
                    </div>
                    <button @click="subscribe">{{ buttonText }}</button>
                </div>
                <img :src="showCaseImage" class="fresh-apple">
            </div>
        </div>
    </div>
</template>

<script>
import PaperPlane from '@/assets/icons/PaperPlane.vue';

export default {
    components: {
        PaperPlane
    },

    props: {
        bgImage: {
            type: String,
            default: "./src/assets/image/BgShowCase.png",
        },
        bgImageWidth: {
            type: String,
            default: "1656px",
        },
        title: {
            type: String,
            default: "Don't miss amazing grocery deals",
        },
        subTitle: {
            type: String,
            default: "Sign up for the daily newsletter",
        },
        inputPlaceholder: {
            type: String,
            default: "Your email address"
        },
        buttonText: {
            type: String,
            default: "Subscribe",
        },
        showCaseImage: {
            type: String,
            default: "./src/assets/image/showCaseImg.png",
        }

    },

    data() {
        return {
            email: "",
        }
    },

    methods: {
        subscribe() {
            if (this.email) {
                alert(`Subscribed successfully with email: ${this.email}`);
                this.email = ""; //clear
            }else {
                alert("Please enter your email.");
            }
        }
    }
}
</script>

<style scoped>
.show-case {
    padding: 10px 16px 10px 16px;
}
img {
    position: absolute;
    z-index: -1;
}
.bg-show-case {
    background-color: #FDC04033;
    width: auto;
    height: 538px;
    border-radius: 20px;
}
.section {
    padding: 70px 0px 0px 100px;
    overflow: hidden;
}
.section .title {
    font-family: "Quicksand", sans-serif;
    padding: 0px 0px 30px 0px;
    font-size: 72px;
    width: 50%;
    font-weight: 700;
    color: #253D4E;
}
.section span {
    color: #7E7E7E;
    font-size: 30px;
    font-family: 'Lato';
}
.subscribe {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 442px;
    padding: 0px 0px 0px 20px;
    border-radius: 50px;
    background: white;
    margin-top: 50px;
}
.icon-input {
    display: flex;
    align-items: center;
    gap: 10px;
}
.icon-input input{
    outline: none;
    border: none;
    font-family: 'Lato';
    font-size: 14px;
    font-weight: 400;
    width: 230px;
    color: #B6B6B6;
}
.subscribe button {
    background-color: #3BB77E;
    border-radius: 50px;
    height: 50px;
    color: white;
    font-family: "Quicksand", sans-serif;
    font-size: 16px;
    font-weight: 700;
    transition: 0.3s;
}
.subscribe button:hover {
    background-color: red;
    color: white;
}
img.fresh-apple {
    position: relative;
    bottom: 460px;
    left: 800px;
    height: 587px;
    width: 885px;
    z-index: 1;
}

</style>