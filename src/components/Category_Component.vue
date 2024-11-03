<script>
export default {
    props: {
        img_src: String,
        quantity: Number,
        label: String,
        background_color: String,
        radius_color: String,
    }
}
</script>

<template>
    <div class="container">
        <img :src="img_src" alt="image_source" height="125" width="130">
        <div class="label quicksand-regular">{{ label || "Unknown" }}</div>
        <div class="quantity lato-regular" v-if="quantity">{{ quantity===1 ? quantity + " Item": quantity + " Item" }}</div>
        <div class="quantity lato-regular" v-else>0 Items</div>        
    </div>
</template>

  
<style scoped>
  @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap");
  @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Quicksand:wght@300..700&display=swap");

  .quicksand-regular {
    font-family: "Quicksand", serif;
    font-optical-sizing: auto;
    font-weight: 700;
    font-style: normal;
  }

  .lato-regular {
    font-family: "Lato", sans-serif;
    font-weight: 400;
    font-style: normal;
  }

  .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 170px;
    height: 200px;
    border-radius: 10px;
    background-color: v-bind(background_color);
    border: 2px solid v-bind(radius_color);
    margin: 10px;
  }

  .container .label {
    font-size: 16px;
    color: #253D4E;
  }

  .container .quantity {
    font-size: 8px;
    color: #B6B6B6;
  }
  
</style>
