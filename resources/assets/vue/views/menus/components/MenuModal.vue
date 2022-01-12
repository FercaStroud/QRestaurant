<script lang="ts">
import {Component, Emit, Prop, Vue} from 'vue-property-decorator';
import {Action, State, namespace} from 'vuex-class';

const mStore = namespace('menus');

@Component
export default class MenuModal extends Vue {
  @Prop() form;
  @Prop() isAdd;
  @Prop() isVisible;
  @Prop() menus;
  @mStore.Action addMenu;
  @mStore.Action editMenu;
  @mStore.Action setModalVisible;
  @mStore.State isModalLoading;
  @Action setDialogMessage;

  handleOk() {
    if (this.isAdd) {
      this.addMenu(this.form);
    } else {
      this.editMenu(this.form);
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
    size="xl"
    :visible='isVisible',
    :cancel-title='$t("buttons.cancel")',
    :ok-disabled='isModalLoading',
    :ok-title='isModalLoading ? $t("buttons.sending") : isAdd ? $t("buttons.add") : $t("buttons.update")',
    :title='isAdd ? $t("menus.add_menu") : $t("menus.edit_menu")',
    @hide='handleClose',
    @ok.prevent='handleOk',
  )
    b-form
      b-row
        b-col(md="12")
          b-form-group(
            :label='$t("menus.name")'
            label-for='name',
          )
            b-form-input#name(
              type='text',
              v-model='form.name',
              maxlength='50',
              required,
            )
        b-col(md="12")
          b-form-group(
            :label='$t("menus.slug")'
            label-for='slug',
          )
            b-form-input#slug(
              type='text',
              v-model='form.slug',
              maxlength='120',
              required,
            )
        b-col(md="12")
          b-form-group(
            :label='$t("menus.type")'
            label-for='type',
          )
            b-form-select#type(
              v-model='form.type',
              :select-size="3"
            )
              b-form-select-option(
                :value="'NORMAL'"
              ) NORMAL
              b-form-select-option(
                :value="'TEXT'"
              ) TEXT
              b-form-select-option(
                :value="'PDF'"
              ) PDF
                b-col(md="12")
        b-col(md="12")
          span {{$t("strings.form_description")}}
          quill-editor(
            ref="categoryQuillEditor"
            v-model="form.description"
            :options="{}"
          )


</template>
