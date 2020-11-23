<script lang="ts">
  import {Component, Emit, Prop, Vue} from 'vue-property-decorator';
  import {Action, State, namespace} from 'vuex-class';

  const uStore = namespace('categories');

  @Component
  export default class CategoryModal extends Vue {
    @Prop() form;
    @Prop() isAdd;
    @Prop() categories;
    @Prop() isVisible;
    @uStore.Action addCategory;
    @uStore.Action editCategory;
    @uStore.Action setModalVisible;
    @uStore.State isModalLoading;
    @Action setDialogMessage;

    handleOk() {

        if (this.form.image_src !== undefined) {
          if (this.form.image_src.size <= '2000000') {
            if (this.isAdd) {
              this.addCategory(this.form);
            } else {
              this.editCategory(this.form);
            }
          } else {
            this.setDialogMessage("La imagen no debe ser mayor a 2MB.");
          }
        } else {
          if (this.isAdd) {
            this.addCategory(this.form);
          } else {
            this.editCategory(this.form);
          }
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
    :title='isAdd ? $t("categories.add_category") : $t("categories.edit_category")',
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

      //b-form-group(
      //  :label='$t("categories.parent_name")'
      //  label-for='parent_id',
      //)
      //  b-form-select#parent_id(
      //    v-model='form.parent_id',
      //    :select-size="4"
      //  )
      //    b-form-select-option(
      //      :value="0"
      //    ) {{ $t("strings.no_parent_category") }}
          //b-form-select-option(
          //  v-for='(category, i) in categories',
          //  :key='category.id',
          //  :value="category.id"
          //  v-if="category.parent_id === 0"
          //) {{ category.name }}

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
        description="Se recomiendan las siguientes medidas W1080px / H500px"
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
