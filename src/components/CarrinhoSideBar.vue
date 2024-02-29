<template>
  <v-container class="mt-0 pt-0">
    <v-row class="ma-0">
      <v-col cols="12" class="mx-0 pa-0">
        <v-list
          lines="one"
          class="bg-grey-lighten-5 pa-4 py-8 rounded-lg"
          transition="fade-transition"
          elevation="2"
        >
          <h2 class="text-h4 text-center">
            <v-badge color="success" :content="store.productsCar.length">
              <v-icon icon="mdi-cart" size="small"></v-icon>
            </v-badge>
            SHOPPING CART
          </h2>
          <transition-group name="list">
            <v-list-item
              v-for="produto in store.productsCar"
              :key="produto.name"
              color="primary"
              rounded="sm"
              class="my-5"
            >
              <v-container class="item-main-container pa-0">
                <div class="mr-5 w-50">
                  <v-list-item-title>{{ produto.name }}</v-list-item-title>
                  <v-list-item-subtitle>{{
                    productPrice(produto)
                  }}</v-list-item-subtitle>
                </div>
                <div class="d-flex align-center">
                  <v-btn
                    variant="text"
                    icon="mdi-minus-circle"
                    color="red-accent-2"
                    @click="changeItemQuantity(produto, 'remove')"
                  ></v-btn>
                  {{ produto.quantity }}
                  <v-btn
                    variant="text"
                    icon="mdi-plus-circle"
                    color="green-accent-4"
                    @click="changeItemQuantity(produto, 'add')"
                  ></v-btn>
                </div>
              </v-container>
              <template v-slot:prepend>
                <v-avatar size="85" rounded="0">
                  <v-img :src="produto.image"></v-img>
                </v-avatar>
              </template>
              <template v-slot:append>
                <v-hover v-slot="{ isHovering, props }">
                  <v-btn
                    v-bind="props"
                    :icon="isHovering ? 'mdi-delete-empty' : 'mdi-delete'"
                    variant="text"
                    elevation="0"
                    color="red-darken-1"
                    @click="removeItem(produto)"
                    class="d-none d-sm-flex"
                  />
                </v-hover>
              </template>
            </v-list-item>
          </transition-group>
          <v-row>
            <v-col class="d-flex justify-space-between mx-7">
              <h2 class="text-center">
                Total:
                <Transition name="fade" mode="out-in">
                  <span style="position: absolute"> {{ precoTotal }}</span>
                </Transition>
              </h2>
              <v-btn append-icon="mdi-shopping-outline" color="success"
                >Order Now</v-btn
              >
            </v-col>
          </v-row>
        </v-list>
      </v-col>
    </v-row>
  </v-container>
</template>

<script setup>
import { computed } from "vue";
import { produtosAppStore } from "@/store/app";
const store = produtosAppStore();

const precoTotal = computed(() => {
  const value = store.productsCar.reduce(
    (total, produtoAtual) => total + produtoAtual.price * produtoAtual.quantity,
    0
  );
  return value.toLocaleString("pt-BR", {
    style: "currency",
    currency: "BRL",
  });
});

const productPrice = (produto) => {
  const value = produto.price * produto.quantity;
  return value.toLocaleString("pt-BR", {
    style: "currency",
    currency: "BRL",
  });
};

const changeItemQuantity = (produto, type) => {
  store.productsCar[store.productsCar.indexOf(produto)].quantity +=
    type == "add" ? 1 : -1;
  if (
    type === "remove" &&
    store.productsCar[store.productsCar.indexOf(produto)].quantity == 0
  ) {
    removeItem(produto);
  }
};

const removeItem = (produto) => {
  store.productsCar.splice(store.productsCar.indexOf(produto), 1);
};
</script>

<style scoped>
.item-main-container {
  display: flex;
  align-items: center;
}

.list-move,
.list-enter-active,
.list-leave-active {
  transition: all 0.5s ease;
}

.list-enter-from {
  opacity: 0;
  transform: translateY(-40px);
}
.list-leave-to {
  opacity: 0;
  transform: translateX(-40px);
}
</style>
