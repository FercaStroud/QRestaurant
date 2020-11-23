<script lang="ts">
import { Component, Vue, Watch } from 'vue-property-decorator';
import { Action, State, namespace } from 'vuex-class';

import dialog from '@/utils/dialog';
const pStore = namespace('products');

@Component(
  {
    components: {
    },
  }
)

export default class ProductList extends Vue {
  @pStore.State fields;
  @pStore.State products;
  @pStore.State isLoading;
  @pStore.State isModalAdd;
  @pStore.State form;
  @pStore.Action deleteProduct;
  @pStore.Action loadProducts;
  @pStore.Action setModalVisible;
  @pStore.Action setModalAdd;
  @pStore.Action setForm;

  async created() {
    await this.getProducts(this.form.menu_id);
  }

  handleEditProduct(product: Product):void{
    //product.image_src = null;
    this.setForm(product);
    this.setModalAdd(false);
    this.setModalVisible(true);
  }

  async deleteProductConfirm(product: Product): Promise<void> {
    if (!(await dialog('front.delete_product_confirmation', true))) {
      return;
    }

    this.deleteProduct(product);
  }

  async getProducts(menu_id: number): Promise<void> {
    this.loadProducts({ menu_id });
  }
}
</script>

<template lang="pug">
div
  b-table.btable(
    striped
    responsive
    hover
    sticky-header
    no-border-collapse
    head-variant="dark"
    :busy="isLoading"
    :items="products"
    :fields="fields"
  )

    template(v-slot:table-busy)
      div.text-center.text-danger
        b-spinner.align-middle

    template(v-slot:head(name)="data")
      span {{$t("products.name")}}
    template(v-slot:head(category_name)="data")
      span {{$t("products.category_name")}}
    template(v-slot:head(description)="data")
      span {{$t("products.description")}}
    template(v-slot:head(price)="data")
      span {{$t("products.price")}}
    template(v-slot:head(image_src)="data")
      span {{$t("products.image_src")}}
    template(v-slot:head(created_at)="data")
      span {{$t("strings.created_at")}}
    template(v-slot:head(updated_at)="data")
      span {{$t("strings.updated_at")}}
    template(v-slot:head(actions)="data")
      span {{$t("strings.actions")}}

    template(v-slot:cell(image_src)="data")
      img(
        v-if="data.item.image_src"
        :src='"/uploads/images/products/" + data.item.image_src'
        style="width:50px;height:50px"
      )

    template(v-slot:cell(price)="data")
      span ${{data.item.price}}

    template(v-slot:cell(actions)="data")
      b-button.btn.table-btn.mb-2(
        size="sm"
        @click="handleEditProduct(data.item)"
        :title="$t('strings.edit')"
      )
        b-icon(
          icon="pencil"
          style="color: #fff;"
        )
      b-button.btn-danger.table-btn.mb-2(
        @click="deleteProductConfirm(data.item)"
        :title="$t('strings.delete')"
        size="sm"
      )
        b-icon(
          icon="trash-fill"
          style="color: #fff"
        )


    template( v-slot:cell(index)="data")
      span {{ data.index + 1 }}


</template>

<style scoped>

</style>
