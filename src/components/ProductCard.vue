<template>
  <v-hover v-slot:="{ isHovering, props }">
    <v-card
      width="300"
      variant="text"
      class="pa-4 mx-auto rounded-lg bg-grey-lighten-5"
      :elevation="isHovering ? 4 : 2"
      close-delay
      v-bind="props"
    >
      <v-img
        :src="
          card.productImg
            ? card.productImg
            : 'https://storage.googleapis.com/proudcity/mebanenc/uploads/2021/03/placeholder-image.png'
        "
        height="200px"
      />
      <v-card-title class="px-2">{{ card.productName }}</v-card-title>
      <v-card-subtitle class="px-2" v-if="card.productPrice"
        >R$ {{ card.productPrice }}</v-card-subtitle
      >
      <v-card-text class="px-2">{{ card.productDesc }}</v-card-text>
      <v-card-actions v-if="!hideShoppingBtn">
        <v-btn
          block
          color="success"
          variant="outlined"
          class="add-btn font-weight-black"
          @click="addToCart"
          >Add to Cart</v-btn
        >
      </v-card-actions>
    </v-card>
  </v-hover>
</template>

<script setup>
const emit = defineEmits(["add-to-cart"]);

function addToCart() {
  emit("add-to-cart", card);
}

const card = defineProps({
  productName: String,
  productPrice: Number,
  productDesc: String,
  productImg: String,
  hideShoppingBtn: Boolean,
});
</script>

<style scoped>
.activity-indicator-container {
  height: 200px;
}

.add-btn {
  transition: all 0.3s;
  &:hover {
    background-color: #53b257 !important;
    color: #fff !important;
  }
}
</style>
