<template>
  <v-container class="fill-height d-flex align-center">
    <p
      class="text-h6 font-weight-black text-grey-darken-3 d-flex align-center mb-10"
    >
      <v-icon
        size="small"
        color="green-lighten-1"
        icon="mdi-file-search"
        class="mr-1"
      />SUMMARY
    </p>
    <div
      class="d-flex justify-space-between w-100 text-subtitle-2 font-weight-light text-grey-darken-3"
    >
      Product Value:
      <p class="text-grey-darken-3 font-weight-black text-body-1">
        {{ fullPrice }}
      </p>
    </div>
    <v-divider class="border-opacity-25"></v-divider>
    <div
      class="d-flex justify-space-between w-100 text-subtitle-2 font-weight-light text-grey-darken-3"
    >
      Shipping Cost:
      <p class="text-grey-darken-3 font-weight-black text-body-1">R$ 0,00</p>
    </div>
    <div class="bg-grey-lighten-5 pa-5 w-100">
      <div
        class="d-flex justify-space-between w-100 text-subtitle-2 font-weight-light text-grey-darken-3 mb-2"
      >
        Total Price:
        <p class="text-grey-darken-3 font-weight-black text-body-1">
          {{ fullPrice }}
        </p>
      </div>
      <p
        class="text-subtitle-2 font-weight-light text-grey-darken-3 text-center"
      >
        (or <b class="font-weight-medium">10x</b> of
        <b class="font-weight-medium">{{ installmentsPrice }}</b
        >)
      </p>
    </div>
    <div class="bg-green-lighten-5 pa-5 w-100 text-teal-darken-4">
      <div class="w-100 text-subtitle-2 font-weight-light mb-2 text-center">
        Cash Value with <b class="font-weight-bold">Pix:</b>
        <p class="text-light-green-darken-4 font-weight-black text-h5">
          {{ discountPrice }}
        </p>
      </div>
      <p class="text-subtitle-2 font-weight-light text-center">
        (Save <b class="font-weight-bold">{{ installmentsPrice }}</b
        >)
      </p>
    </div>
    <v-btn size="large" block color="green">GO TO PAYMENT</v-btn>
    <v-btn size="large" block variant="outlined" color="green"
      >CONTINUE SHOPPING</v-btn
    >
  </v-container>
</template>

<script setup>
import { computed } from "vue";
import { produtosAppStore } from "@/store/app";
const store = produtosAppStore();

const fullPrice = computed(() => {
  const value = store.productsCar.reduce(
    (total, produtoAtual) => total + produtoAtual.price * produtoAtual.quantity,
    0
  );
  return value.toLocaleString("pt-BR", {
    style: "currency",
    currency: "BRL",
  });
});

const discountPrice = computed(() => {
  const value =
    store.productsCar.reduce(
      (total, produtoAtual) =>
        total + produtoAtual.price * produtoAtual.quantity,
      0
    ) * 0.9;
  return value.toLocaleString("pt-BR", {
    style: "currency",
    currency: "BRL",
  });
});

const installmentsPrice = computed(() => {
  const value =
    store.productsCar.reduce(
      (total, produtoAtual) =>
        total + produtoAtual.price * produtoAtual.quantity,
      0
    ) * 0.1;
  return value.toLocaleString("pt-BR", {
    style: "currency",
    currency: "BRL",
  });
});
</script>

<style scoped></style>
