import { defineStore } from "pinia";
import { onMounted, ref } from "vue";
import axios from "axios";

export const produtosAppStore = defineStore("products", () => {
  const products = ref([]);
  const productsCar = ref([]);

  const user = ref({
    name: "",
    compras: [],
  });

  const getProducts = async () => {
    let url = "http://127.0.0.1:8000/api/products";
    await axios.get(url).then((response) => {
      products.value = response.data.products;
    });
  };

  getProducts();

  return { products, productsCar, user, getProducts };
});
