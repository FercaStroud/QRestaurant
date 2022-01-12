<script lang="ts">
import {Component, Emit, Prop, Vue} from 'vue-property-decorator';
import {Action, State, namespace} from 'vuex-class';

const pStore = namespace('products');
const cStore = namespace('categories');

@Component
export default class ProductModal extends Vue {
  @Prop() form;
  @Prop() isAdd;
  @Prop() product;
  @Prop() isVisible;
  @cStore.State categories;
  @pStore.State isModalLoading;
  @pStore.Action addProduct;
  @pStore.Action editProduct;
  @pStore.Action setModalVisible;
  @cStore.Action loadCategories;
  @Action setDialogMessage;

  mounted() {
    this.$nextTick(() => {
      this.getCategories(this.form.menu_id);
    });
  }

  handleOk() {
    if (this.form.image_src !== undefined && this.form.image_src !== null) {
      if (this.form.image_src.size <= '2000000') {
        if (this.isAdd) {
          this.addProduct(this.form);
        } else {
          this.editProduct(this.form);
        }
      } else {
        this.setDialogMessage("La imagen no debe ser mayor a 2MB.");
      }
    } else {
      if (this.isAdd) {
        this.addProduct(this.form);
      } else {
        this.editProduct(this.form);
      }
    }

  }

  async getCategories(menu_id: number): Promise<void> {
    this.loadCategories({menu_id});
  }

  handleClose() {
    this.setModalVisible(false);
  }
}
</script>

<template lang="pug">
  b-modal(
    size="xl"
    hide-header-close=true,
    :visible='isVisible',
    :cancel-title='$t("buttons.cancel")',
    :ok-disabled='isModalLoading',
    :ok-title='isModalLoading ? $t("buttons.sending") : isAdd ? $t("buttons.add") : $t("buttons.update")',
    :title='isAdd ? $t("products.add_product") : $t("products.edit_product")',
    @hide='handleClose',
    @ok.prevent='handleOk',
  )
    b-form
      b-row
        b-col(md="8")
          b-form-group(
              :label='$t("strings.name")'
              label-for='name',
            )
              b-form-input#name(
                type='text',
                v-model='form.name',
                maxlength='191',
                required,
              )

        b-col(md="4")
          b-form-group(
            :label='$t("strings.price")'
            label-for='description',
          )
            b-form-input#price(
              type='number',
              min="0"
              step="0.01"
              v-model='form.price',
            )

        b-col(md="12")
          b-form-group(
            :label='$t("categories.text")'
            label-for='category_id',
          )
            b-form-select#category_id(
              v-model='form.category_id',
              :select-size="4"
            )
              b-form-select-option(
                v-for='(category, i) in categories',
                :key='category.id',
                :value="category.id"
              ) {{ category.name }}

        b-col(md="12")
          span {{$t("strings.form_description")}}
          quill-editor(
            ref="categoryQuillEditor"
            v-model="form.description"
            :options="{}"
          )

</template>
