<template>
  <div class="d-flex align-content-center flex-column bg-grey-lighten-4">
    <h1 class="my-5 ml-3 text-h2 text-center">Products</h1>
    <v-row class="justify-center">
      <v-col
        :cols="store.productsCar.length > 0 ? 7 : 12"
        class="d-flex flex-wrap justify-center"
        style="max-width: 90%; grid-row-gap: 15px"
      >
        <ProductCard
          v-for="product in store.products"
          class="transition-all"
          :key="product.id"
          :productName="product.name"
          :productPrice="product.price"
          :productDesc="product.description"
          :productImg="product.image"
          @add-to-cart="onAddToCart(product)"
        />
      </v-col>
      <v-col cols="md-4 xs-8" v-if="store.productsCar.length > 0" class="px-5">
        <CarrinhoCompras />
      </v-col>
      <v-col cols="12"> </v-col>
    </v-row>
  </div>
</template>

<script setup>
import ProductCard from "./ProductCard.vue";
import CarrinhoCompras from "./CarrinhoSideBar.vue";
import { produtosAppStore } from "@/store/app";
const store = produtosAppStore();
function onAddToCart(product) {
  var checkProduct = store.productsCar.filter((productCar) => {
    return product.id === productCar.id;
  });

  checkProduct.length > 0
    ? store.productsCar[store.productsCar.indexOf(checkProduct[0])].quantity++
    : store.productsCar.push({ ...product, quantity: 1 });
}

setTimeout(() => {
  let chickenProductIndex;
  store.products.filter((product, index) => {
    if (product.name == "Chicken") chickenProductIndex = index;
  });
  store.products[chickenProductIndex].img =
    "https://seara.com.br/wp-content/uploads/2022/10/7894904797905_Frango_inteiro_congelado_Seara_PRINCIPAL_520x440.png";
}, 5000);
</script>

<style scoped>
.produtos {
  gap: 20px;
  max-width: 80vw;
}
</style>
