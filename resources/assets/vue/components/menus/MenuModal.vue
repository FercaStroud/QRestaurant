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

    handleClose(){
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
    :title='isAdd ? $t("menus.add_menu") : $t("menus.edit_menu")',
    @hide='handleClose',
    @ok.prevent='handleOk',
  )
    b-form
      b-form-group(
        :label='$t("menus.name")'
        label-for='name',
      )
        b-form-input#name(
          type='text',
          v-model='form.name',
          maxlength='191',
          required,
        )

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

</template>
