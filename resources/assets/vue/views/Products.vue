<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import {Action, namespace} from 'vuex-class';
import ProductList from '@/components/products/ProductList.vue';
import ProductModal from '@/components/products/ProductModal.vue';

const pStore = namespace('products');

@Component(
  {
    components: {ProductModal, ProductList}
  }
)
export default class Products extends Vue {
  @Action setBackUrl;
  @Action setMenu;
  @pStore.Action setModalVisible;
  @pStore.Action setForm;
  @pStore.Action setModalAdd;
  @pStore.State isModalVisible;
  @pStore.State isModalAdd;
  @pStore.State form;

  product: Partial<Product> = {};

  mounted() {
    this.product.menu_id = parseInt(this.$route.params.id);
    this.setForm(this.product);
    this.setBackUrl('/menus');
    this.setMenu(
      [
        {
          text: 'products.add_product',
          key: 1,
          handler: this.addProduct
        },
      ]
    );
  }

  addProduct(): void {
    this.setForm(this.product);
    this.setModalAdd(true);
    this.setForm(this.product);
    this.form.menu_id = parseInt(this.$route.params.id);
    this.setModalVisible(true);
  }
}
</script>

<template lang="pug">
  b-container(fluid="")
    b-row
      b-col
        h2 {{ $t('products.title') }}
        ProductList

    product-modal(
      ref='products_modal',
      :form="form"
      :is-add='isModalAdd',
      :is-visible='isModalVisible',
    )

</template>
