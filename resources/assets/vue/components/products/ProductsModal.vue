<script lang="ts">
  import {Component, Emit, Prop, Vue} from 'vue-property-decorator';
  import {Action, State, namespace} from 'vuex-class';

  const uStore = namespace('products');

  @Component
  export default class ProductsModal extends Vue {
    @Prop() form;
    @Prop() isAdd;
    @Prop() isVisible;
    @uStore.Action addProduct;
    @uStore.Action editProduct;
    @uStore.Action setModalVisible;
    @uStore.State isModalLoading;

    async created() {
    }

    handleOk() {

      if (this.isAdd) {
        this.addProduct(this.form);
      } else {
        this.editProduct(this.form);
      }
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
