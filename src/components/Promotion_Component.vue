<script>
import Shop_Button from './Shop_Button.vue';

export default {
    components: {
        Shop_Button
    },
    props: {
        orange_juice_img: String,
        img_src: String,
        label: String,
        background_color: String,
        button_color: String,
    },
    methods: {
      shopNow() {
        alert("Let's shop: " + this.label);
      }
    }
}
</script>

<template>
    <div class="container">
        <div class="inner-container">
            <div class="label quicksand-regular">
                {{ label }}
            </div>
            <div class="button">
                <Shop_Button :background_color="button_color" @click="shopNow"/>
            </div>
        </div>
        <img :src="img_src" alt="image_source">
    </div>
</template>


<style scoped>
  /* Quicksand font */
  @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Quicksand:wght@300..700&display=swap");

  .quicksand-regular {
    font-family: "Quicksand", serif;
    font-optical-sizing: auto;
    font-weight: 700;
    font-style: normal;
  }

  .container {
    display: flex;
    flex-direction: row;
    align-items: center;
    width: 560px;
    height: 310px;
    border-radius: 10px;
    background-color: v-bind(background_color);
    border: 1px solid v-bind(radiusColor);
    margin: 8px;
    padding-right: 40px;
  }

  .inner-container {
    width: inherit;
    height: 160px;
    display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: space-between;
    margin-left: 30px;
  }

  .container .label {
    white-space: pre;
    font-size: 28px;
    color: #253D4E;
  }

  .container img {
    width: 320px;
    height: 200px;
    align-self: end;
  }

  .orange-juice-image img{
    position: relative;
    top: 60px;
    height: 400px;
    width: 400px;
  }

  .button {
    align-self: self-start;
  }
 
</style>