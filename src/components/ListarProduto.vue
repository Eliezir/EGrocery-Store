<template>
  <div
    class="w-100 d-flex justify-center align-center bg-grey-lighten-5 mt-5 pa-3 flex-column"
  >
    <v-text-field
      label="Search ..."
      v-model="search"
      color="green"
      class="align-self-start ml-15"
      style="width: 250px"
      variant="outlined"
      append-inner-icon="mdi-magnify"
      density="comfortable"
    ></v-text-field>
    <v-data-table
      :headers="headers"
      :items="store.products"
      :search="search"
      :ref="tableRef"
      style="width: 95%"
      class="rounded-lg bg-grey-lighten-5"
    >
      <template v-slot:[`header.actions`]="{ item }">
        <v-btn icon @click="openDiaolog(-1)" color="success" variant="plain">
          <v-icon>mdi-plus-circle</v-icon>
        </v-btn>
      </template>
      <template v-slot:[`item.name`]="{ item }">
        <div class="d-flex align-center" style="width: 200px">
          <img
            :src="item.image"
            height="50"
            width="50"
            class="rounded-lg mr-3"
          />
          <p class="text-body-1 font-weight-">{{ item.name }}</p>
        </div>
      </template>
      <template v-slot:[`item.actions`]="{ item }">
        <v-menu transition="scale-transition">
          <template v-slot:activator="{ props }">
            <v-btn
              icon="mdi-dots-vertical"
              v-bind="props"
              variant="plain"
            ></v-btn>
          </template>

          <v-list class="bg-grey-lighten-5">
            <v-list-item>
              <v-btn
                @click="openDiaolog(item.id)"
                prepend-icon="mdi-pencil"
                block
                class="bg-grey-lighten-5 rounded-0 justify-start"
              >
                Edit
              </v-btn>
            </v-list-item>
            <v-list-item>
              <v-btn
                @click="deleteProduct(item.id)"
                prepend-icon="mdi-delete"
                class="bg-grey-lighten-5 rounded-0"
              >
                Delete
              </v-btn>
            </v-list-item>
          </v-list>
        </v-menu>
      </template>
    </v-data-table>
  </div>
  <CadastroProduto ref="dialog" />
</template>

<script setup>
import axios from "axios";
import CadastroProduto from "./CadastroProduto.vue";

const search = ref("");
const tableRef = ref(null);
const headers = [
  { title: "Product", value: "name", sortable: true },
  { title: "Price", value: "price", sortable: true, align: "start" },
  { title: "Description", value: "description", sortable: true, align: "start"},
  { title: "", value: "actions", sortable: false, align: "start"},
];

const dialog = ref(null);

const openDiaolog = (id) => {
  dialog.value.openModal(id);
};

import { produtosAppStore } from "@/store/app";
import { ref } from "vue";
const store = produtosAppStore();

const deleteProduct = async (id) => {
  let url = `http://127.0.0.1:8000/api/delete_product/${id}`;
  await axios
    .delete(url)
    .then((response) => {
      if (response.status === 200) {
        alert(response.data.message);
        store.getProducts();
      }
    })
    .catch((error) => {
      console.log(error);
    });
};
</script>
