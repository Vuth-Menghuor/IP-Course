<template>
    <div class="position">
        <div class="container">
            <div class="newProducts" :style="dynamicStyle">
                <div v-if="isNaN(percentage)">{{ percentage }}</div>
                <div v-else> {{ "-" + percentage+"%" }}</div>

            </div>
            <div class="positionImg">
                <img :src="imgPath" height="180px" width="210px" class="mango_img">
            </div>
            <div class="infoItem">
                <div class="hodo_food">{{ "Hodo Food" }}</div>
                <div class="quicksand label">{{ name }}</div>
            </div>
            <div class="review">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FDC040" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FDC040" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FDC040" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FDC040" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="#CDCDCD" viewBox="0 0 24 24" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <div class="quicksand-regular">{{ "("+rating+".0)" }}</div>
            </div>
            <div class="gram">{{ size }}</div>
            <div class="contentPrice">
              <div class="price">
                <template v-if="discountedPrice !== -1">
                  <div class="price1">{{ '$'+ discountedPrice }}</div>
                  <div class="price2" id="discountedPrice"><del>{{ "$" + price }}</del></div>
                </template>
                <div v-else class="price1">{{ '$'+price }}</div>
              </div>
              <div class="quantityInput">
                  <button  @click="btnAddClick" v-if="!addClick" class="AddBtn">Add +</button>
                  <input v-else class="inputNum" type="number" v-model="amount">
              </div>
            </div>
        </div>
    </div>
</template>
  
  <script>
    export default {
      props: {
        name: String,
        imgPath: String,
        price: Number,
        percentage: Number,
        rating: Number,
        size: String,
        countSold: Number,
        instock: Number
      },

      data() {
        return {
          addClick: false,
          amount: 0,
        }
      },
      methods: {
        btnAddClick() {
          this.addClick = true
          this.amount = 1
        },
      },
      watch: {
        amount(val) {
          if (val === 0){
            this.addClick = false
          }
        }
      },
      computed: {
        discountedPrice(){
          if(!isNaN(this.percentage)) {
            let newPrice = this.price * (1 - this.percentage/100)
            return newPrice.toFixed(2)  
          }
          return -1
        },
        dynamicStyle() {
          if (typeof this.percentage === "number") {
            return {backgroundColor: "#3BB77E"};
          }else if (this.percentage === "Hot") {
            return {backgroundColor: "#FD6E6E"};
          }else if (this.percentage === "Sale") {
            return {backgroundColor: "#FDC040"};
          }else {
            return {backgroundColor: "transparent"};
          }
        },
      }
    }
  </script>
  
  <style scoped>
  @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap");
  @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Quicksand:wght@300..700&display=swap");
  @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap");
    
    .position {
      display: flex;
      padding-left: 20px;
    }
  
    .container {
        display: flex;
        flex-direction: column;
        height: 480px;
        width: 350px;
        border: 1px solid;
        border-color: rgb(170, 170, 170);
        border-radius: 10px;
        padding-top: 20px;
    }
  
    .newProducts {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 60px;
      height: 34px;
      color: white;
      background-color: #3BB77E;
      border-radius: 0px 20px 20px 0px;
      font-family: 'Lato';
      transition: background-color 0.3s ease;

    }
  
    .positionImg {
      display: flex;
      justify-content: center;
    }
  
    .mango_img {
      padding-top: 10px;
  
    }
  
    .infoItem {
      padding: 20px 0px 0px 20px;
      line-height: 24px;
      color: black;
    }
    .hodo_food {
      font-family: 'Lato';
      font-size: 16px;
      color: gray;
      font-size: 14px;
  
    }
  
    .quicksand {
      font-family: "Quicksand", serif;
      font-weight: bold;
      font-size: 16px;
    }
  
    .quicksand-regular {
      font-family: "Quicksand", serif;
      font-size: 14px;
      margin-left: 10px;
      font-weight: 500;
      color: #7E7E7E;
    }
  
    .review {
      display: flex;
      padding-left: 20px;
      text-align: center;
      padding-top: 10px;
      padding-bottom: 6px;
    }
  
    .size-6 {
      height: 18px;
      color: #FDC040;
    }
  
    .gram {
      padding-left: 20px;
      color: #7E7E7E; 
      font-family: "Quicksand", serif;
      font-size: 16px;
      font-weight: 500;
    }

  
    .contentPrice {
      display: flex;
      justify-content: space-between;
      padding-top: 10px;
      font-family: "Quicksand", serif;
      font-weight: bold;
      align-items: center;
    }
  
    .price {
      display: flex;
      padding: 20px;
      align-items: end;
    }
  
    .price1 {
      padding-right: 10px;
      font-size: 24px;
      color: #3BB77E;
    }
  
    .price2 {
      color: #7E7E7E;
    }
  
    .quantityInput {
      display: flex;
      align-items: center;
      justify-content: center;
      padding-left: 100px;
  
    }

    .quantityInput > * {
      margin-right: 20px;
    }
  
    .inputNum {
      display: flex;
      text-align: center;
      padding: 10px;
      width: 3vw;
      border: 1px solid #3BB77E;
      border-radius: 6px;
      color: #3BB77E;
    }

    input[type=number]:focus {
      border: 1px solid #3BB77E;
      outline: none;
    }
  
    .AddBtn {
      cursor: pointer;
      border: none;
      background-color: #DEF9EC;
      color: #3BB77E;
      font-family: "Quicksand", serif;
      font-weight: bold;
      width: 4vw;
      border-radius: 6px;
    }
    .label {
      word-wrap: break-word;
      padding-right: 24px;
    }
  
  </style>
  