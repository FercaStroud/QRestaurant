<script lang="ts">
import {Component, Vue, Watch} from 'vue-property-decorator';
import {Action, State, namespace} from 'vuex-class';

import dialog from '@/utils/dialog';
import AddFileModal from './AddFileModal.vue';

const pStore = namespace('products');

@Component(
  {
    components: {
      AddFileModal
    },
  }
)

export default class ProductList extends Vue {
  @pStore.State fields;
  @pStore.State products;
  @pStore.State isLoading;
  @pStore.State isModalAdd;
  @pStore.State form;
  @pStore.State isAddFileModalVisible;
  @pStore.Action deleteProduct;
  @pStore.Action loadProducts;
  @pStore.Action setModalVisible;
  @pStore.Action setModalAdd;
  @pStore.Action setForm;
  @pStore.Action setAddFileModalVisible;


  search = '';

  mounted() {
    this.$nextTick(() => {
      this.getProducts(this.form.menu_id);
    });
  }

  handleEditProduct(product: Product): void {
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

  handleAddFile(product: Product): void {
    this.setForm(product);
    this.setAddFileModalVisible(true);
  }

  async getProducts(menu_id: number): Promise<void> {
    this.loadProducts({menu_id});
  }
}
</script>

<template lang="pug">
  div
    b-form-input#search.mb-2(
      type="search"
      v-model='search',
      :placeholder='$t("strings.search")'
      style="width:230px;float:right"
    )
    b-button(
      style="margin-bottom: 5px;"
      @click="getProducts(parseInt($route.params.id))"
      size="sm"
      variant="dark"
    ) {{ $t('strings.update_table') }}

    b-table.btable(
      style="max-height: calc(100vh - 300px);"
      hover
      responsive
      sticky-header
      no-border-collapse
      striped
      outlined
      head-variant="dark"
      :busy="isLoading"
      :items="products"
      :fields="fields"
      select-mode="single"
      small
      :filter="search"
    )

      template(v-slot:table-busy)
        div.text-center.text-danger
          b-spinner.align-middle

      template(v-slot:head(name)="data")
        .text-nowrap {{$t("products.name")}}
      template(v-slot:head(category_name)="data")
        .text-nowrap {{$t("products.category_name")}}
      template(v-slot:head(description)="data")
        .text-nowrap {{$t("products.description")}}
      template(v-slot:head(price)="data")
        .text-nowrap {{$t("products.price")}}
      template(v-slot:head(image_src)="data")
        .text-nowrap {{$t("products.image_src")}}
      template(v-slot:head(created_at)="data")
        .text-nowrap {{$t("strings.created_at")}}
      template(v-slot:head(updated_at)="data")
        .text-nowrap {{$t("strings.updated_at")}}
      template(v-slot:head(actions)="data")
        .text-nowrap {{$t("strings.actions")}}

      template(v-slot:cell(image_src)="data")
        b-button.text-size-small(
          v-if="data.item.image_src"
          :href='"/uploads/images/products/" + data.item.image_src'
          target="_blank"
          size="sm"
          variant="warning"
        ) {{ $t('strings.show') }}

      template(v-slot:cell(created_at)="data")
        span {{ data.item.created_at | moment("D, MMMM YYYY") }}
      template(v-slot:cell(updated_at)="data")
        span {{ data.item.updated_at | moment("D, MMMM YYYY") }}
      template(v-slot:cell(price)="data")
        .text-nowrap ${{data.item.price}}

      template(v-slot:cell(actions)="data")
        b-button.btn.table-btn.mb-2.text-size-small(
          size="sm"
          variant="warning"
          @click="handleAddFile(data.item)"
          :title="$t('strings.add_image')"
        )
          b-icon(
            icon="cloud-upload"
            style="color: #000"
          )
        b-button.btn.table-btn.mb-2.text-size-small(
          size="sm"
          @click="handleEditProduct(data.item)"
          :title="$t('strings.edit')"
        )
          b-icon(
            icon="pencil"
            style="color: #fff;"
          )
        b-button.btn-danger.table-btn.mb-2.text-size-small(
          @click="deleteProductConfirm(data.item)"
          :title="$t('strings.delete')"
          size="sm"
        )
          b-icon(
            icon="trash-fill"
            style="color: #fff"
          )

      template(v-slot:cell(description)="data")
        b-button.btn-block.text-size-small(
          size="sm"
          variant="warning"
          @click="data.toggleDetails"
          :title="(data.detailsShowing ? $t('strings.hide') : $t('strings.show'))+' '+$t('strings.details')"
        )
          span {{ data.detailsShowing ? $t('strings.hide') : $t('strings.show') }} {{ $t('strings.details') }}

      template(#row-details='data')
        b-container(fluid)
          b-row
            b-col
              b-card.shadow.p-3(v-html="data.item.description")

      template( v-slot:cell(index)="data")
        .text-nowrap {{ data.index + 1 }}


    add-file-modal(
      ref='add-file-category_modal',
      :form='form',
      :is-visible='isAddFileModalVisible',
    )
</template>

<style scoped>

</style>
