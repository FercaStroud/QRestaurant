<script lang="ts">
import { Component, Emit, Prop, Vue } from 'vue-property-decorator';
import { Action, State, namespace } from 'vuex-class';

const uStore = namespace('categories');

@Component
export default class CategoriesModal extends Vue {
  @Prop() form;
  @Prop() isAdd;
  @Prop() isVisible;
  @uStore.Action addCategory;
  @uStore.Action editCategory;
  @uStore.Action setModalVisible;
  @uStore.State isModalLoading;

  handleOk() {
    if (this.isAdd) {
      this.addCategory(this.form);
    } else {
      this.editCategory(this.form);
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
  :title='isAdd ? $t("categories.add_categories") : $t("categories.edit_categories")',
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
        required,
      )
    b-form-group(
      :label='$t("strings.image")'
      label-for='image_src',
    )
      b-form-input#image_src(
        type='text',
        v-model='form.image_src',
        maxlength='191',
        required,
      )

</template>
