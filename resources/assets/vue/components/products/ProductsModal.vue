<script lang="ts">
  import {Component, Emit, Prop, Vue} from 'vue-property-decorator';
  import {Action, State, namespace} from 'vuex-class';

  const pStore = namespace('products');
  const cStore = namespace('categories');


  @Component
  export default class ProductsModal extends Vue {
    @Prop() form;
    @Prop() isAdd;
    @Prop() isVisible;
    @cStore.State categories;
    @pStore.State isModalLoading;
    @pStore.Action addProduct;
    @pStore.Action editProduct;
    @pStore.Action setModalVisible;
    @cStore.Action loadCategories;
    @Action setDialogMessage;

    async created() {
      if (this.categories.length == 0) {
        await this.getCategories(1);
      }
      this.form.name = '';
      this.form.description = '';
      this.form.price = '';
      this.form.categories = '';
    }
    checkForm() {
      let vm = this;
      let isValid = true;
      Object.keys(this.form).forEach(function (index, item) {
        console.log(vm.form[index])
        if (vm.form[index] === "") {
          isValid = false
        }
      });
      return isValid;
    }

    handleOk() {
      if (this.checkForm()) {
        if (this.form.image_src !== undefined) {
          if (this.form.image_src.size <= '2000000') {
            if (this.isAdd) {
              this.addProduct(this.form);
            } else {
              this.addProduct(this.form);
            }
          } else {
            this.setDialogMessage("La imagen no debe ser mayor a 2MB.");
          }
        } else{
          if (this.isAdd) {
            this.addProduct(this.form);
          } else {
            this.addProduct(this.form);
          }
        }
      }else {
        this.setDialogMessage("Todos los campos son requeridos.");
      }
    }

    async getCategories(page: number): Promise<void> {
      this.loadCategories({ page });
    }

    handleClose() {
      this.setModalVisible(false);
    }
  }
</script>

<template lang="pug">
  b-modal(
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

      b-form-group(
        :label='$t("strings.price")'
        label-for='description',
      )
        b-form-input#price(
          type='number',
          min="0"
          v-model='form.price',
        )

      b-form-group(
        :label='$t("strings.description")'
        label-for='description',
      )
        b-form-textarea#description(
          type='text',
          v-model='form.description',
        )

      b-form-group(
        :label='$t("strings.image")'
        label-for='image_src',
        description="Se recomiendan las siguientes medidas W500px / H500px"
      )
        b-form-file#image_src(
          type='text',
          accept="image/*",
          :browse-text='$t("strings.browse")',
          :state="Boolean(form.image_src)"
          v-model='form.image_src',
          maxlength='191',
          :placeholder='$t("strings.choose_img")'
          :drop-placeholder='$t("strings.drop_img")'
        )

</template>
