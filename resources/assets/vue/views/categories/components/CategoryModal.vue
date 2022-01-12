<script lang="ts">
import {Component, Emit, Prop, Vue} from 'vue-property-decorator';
import {Action, State, namespace} from 'vuex-class';

const cStore = namespace('categories');

@Component
export default class CategoryModal extends Vue {
  @Prop() form;
  @Prop() isAdd;
  @Prop() categories;
  @Prop() isVisible;
  @cStore.Action addCategory;
  @cStore.Action editCategory;
  @cStore.Action setModalVisible;
  @cStore.State isModalLoading;
  @Action setDialogMessage;

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
    size="xl",
    scrollable
    centered
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
      b-row
        b-col(md="12")
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
        b-col(md="12")
          span {{$t("strings.form_description")}}
          quill-editor(
            ref="categoryQuillEditor"
            v-model="form.description"
            :options="{}"
          )
</template>
