<script lang="ts">
  import { Component, Vue, Watch } from 'vue-property-decorator';
  import { Action, State, namespace } from 'vuex-class';

  import dialog from '@/utils/dialog';

  import ProductsCard from '@/components/products/ProductsCard.vue';
  import ProductsModal from '@/components/products/ProductsModal.vue';

  const uStore = namespace('products');

  @Component({
    components: {
      ProductsCard,
      ProductsModal,
    },
  })

  export default class Products extends Vue {
    @Action setBackUrl;
    @Action setMenu;
    @uStore.State products;
    @uStore.State pagination;
    @uStore.State isLoading;
    @uStore.State isModalVisible;
    @uStore.Action deleteProduct;
    @uStore.Action loadProducts;
    @uStore.Action setModalVisible;

    currentPage = 1;
    form: Partial<Product> = {};
    isModalAdd = true;

    async created() {
      this.setBackUrl('/');
      this.setMenu([
        {
          key: 'add_product',
          text: 'products.add_product',
          handler: this.addProduct,
        },
      ]);

      this.currentPage = this.pagination.currentPage;

      if (this.products.length == 0) {
        await this.getProducts(1);
      }
    }

    addProduct(): void {
      this.isModalAdd = true;
      this.setModalVisible(true);
    }

    editProduct(product: Product, index: number): void {
      this.isModalAdd = false;
      this.setModalVisible(true);

      this.form = { ...product };
    }

    async deleteProductConfirm(product: Product): Promise<void> {
      if (!(await dialog('front.delete_product_confirmation', true))) {
        return;
      }

      this.deleteProduct(product);
    }

    async getProducts(page: number): Promise<void> {
      this.loadProducts({ page });
    }
  }
</script>

<template lang="pug">
  b-container(tag='main')
    b-pagination(
      align='center',
      v-if='pagination.totalProducts > pagination.perPage',
      v-model='currentPage',
      :per-page='pagination.perPage',
      :total-rows='pagination.totalProducts',
      @change='getProducts',
    )

    .categories(v-if='products.length > 0')
      b-row
        products-card(
          v-for='(product, i) in products',
          :key='product.id',
          :product='product',
          @edit-product='editProduct(product, i)',
          @delete-product='deleteProductConfirm(product)',
        )

    div(v-else-if='isLoading') {{ $t('strings.loading') }}...

    div(v-else) {{ $t('products.no_products') }}

    b-pagination(
      align='center',
      v-if='pagination.totalProducts > pagination.perPage',
      v-model='currentPage',
      :per-page='pagination.perPage',
      :total-rows='pagination.totalProducts',
      @change='getProducts',
    )

    products-modal(
      ref='products_modal',
      :form='form',
      :products='products'
      :is-add='isModalAdd',
      :is-visible='isModalVisible',
    )
</template>
