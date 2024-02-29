<template>
  <v-container>
    <v-dialog v-model="dialog" max-width="1080">
      <v-row
        class="align-center bg-white rounded-lg flex-row-reverse justify-center"
      >
        <v-col cols="12" class="d-flex justify-space-between">
          <h1 class="mb-5 pa-5">
            {{ editMode ? "Edit A Product " : "Register A New Product" }}
          </h1>
          <v-btn @click="dialog = false" variant="text" icon>
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-col>
        <v-col cols="12" md="8">
          <v-form
            @submit.prevent="editMode ? editProduct() : addProduct()"
            v-model="formValido"
            ref="form"
            class="d-flex flex-column"
          >
            <v-text-field
              variant="outlined"
              class="mb-3"
              label="Product Name"
              v-model="productData.name"
              :rules="nameValidation"
            />
            <v-text-field
              variant="outlined"
              class="mb-3"
              label="Price"
              type="number"
              v-model="productData.price"
              :rules="priceValidation"
            />
            <v-text-field
              variant="outlined"
              class="mb-3"
              label="Description"
              v-model="productData.description"
              :rules="descriptionValidation"
            />
            <v-text-field
              variant="outlined"
              class="mb-3"
              label="Product Image URL"
              clearable="true"
              v-model="productData.img"
              :rules="imgValidation"
            />
            <v-btn
              :color="formValido ? 'success' : 'green-lighten-1'"
              type="submit"
              class="justify-self-end w-25 ml-auto"
              :disabled="!formValido"
              :append-icon="editMode ? 'mdi-pencil' : 'mdi-plus'"
            >
              {{ editMode ? "Edit" : "Register" }}</v-btn
            >
          </v-form>
        </v-col>
        {{ productData.value }}
        <v-col cols="12" md="4" class="mb-15">
          <product-card
            :product-name="productData.name"
            :product-price="productData.price"
            :product-desc="productData.description"
            :product-img="productData.img"
            :hide-shopping-btn="true"
            @add-to-cart="addToCart"
          />
        </v-col>
      </v-row>
    </v-dialog>
  </v-container>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import ProductCard from "./ProductCard.vue";

const dialog = ref(false);
const editMode = ref(false);

const productData = ref({
  name: "",
  price: "",
  description: "",
  img: "",
  id: "",
});

const openModal = (id) => {
  if (id >= 0) {
    editMode.value = true;
    const product = store.products.find((product) => product.id === id);
    productData.value = {
      name: product.name,
      price: product.price,
      description: product.description,
      img: product.image,
      id: product.id,
    };
  } else {
    editMode.value = false;
    productData.value = {
      name: "",
      price: "",
      description: "",
      img: "",
      id: "",
    };
  }
  dialog.value = true;
};

defineExpose({ openModal });

import { produtosAppStore } from "@/store/app";
const store = produtosAppStore();

const formValido = ref(false);

const form = ref(null);

const nameValidation = ref([(name) => !!name || "Product name is required"]);

const priceValidation = ref([
  (price) => !!price || "Product price is required",
  (price) => Number(price) > 0 || "Please enter a valid price",
]);

const imgValidation = ref([
  (img) => !!img || "Product image URL is required",
  (img) =>
    /^(http|https):\/\/[^ "]+$/.test(img) || "Please enter a valid image URL",
]);

const descriptionValidation = ref([
  (description) => !!description || "Product description is required",
  (description) =>
    description.length >= 10 ||
    "Product description must be at least 10 characters long",
]);

const addProduct = async () => {
  const { name, price, description, img } = productData.value;
  const url = "http://127.0.0.1:8000/api/add_product";
  let formData = new FormData();
  formData.append("name", name);
  formData.append("price", price);
  formData.append("description", description);
  formData.append("image", img);
  await axios
    .post(url, formData)
    .then((response) => {
      if (response.status === 200) {
        store.getProducts();
      }
    })
    .catch((error) => {
      console.log(error);
    });
  dialog.value = false;
  clearForm();
};

const editProduct = async () => {
  const { name, price, description, img, id } = productData.value;
  const url = `http://127.0.0.1:8000/api/update_product/${id}`;
  let formData = new FormData();
  formData.append("name", name);
  formData.append("price", price);
  formData.append("description", description);
  formData.append("image", img);
  await axios
    .post(url, formData)
    .then((response) => {
      if (response.status === 200) {
        store.getProducts();
      }
    })
    .catch((error) => {
      console.log(error);
    });
  dialog.value = false;
  clearForm();
};

function clearForm() {
  form.value.reset();
}
</script>
