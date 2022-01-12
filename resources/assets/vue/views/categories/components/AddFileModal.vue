<script lang="ts">
import {Component, Emit, Prop, Vue} from 'vue-property-decorator';
import {Action, State, namespace} from 'vuex-class';

const cStore = namespace('categories');

@Component
export default class AddFileModal extends Vue {
  @Prop() form;
  @Prop() isVisible;
  @cStore.Action addFile;
  @cStore.Action setAddFileModalVisible;
  @cStore.State isModalLoading;
  @Action setDialogMessage;

  handleOk() {
      this.addFile(this.form);
  }

  handleClose() {
    this.setAddFileModalVisible(false);
  }
}
</script>

<template lang="pug">
  b-modal(
    size="md",
    scrollable
    centered
    hide-header-close=true,
    :visible='isVisible',
    :cancel-title='$t("buttons.cancel")',
    :ok-disabled='isModalLoading',
    :ok-title='isModalLoading ? $t("buttons.sending") : $t("buttons.add")',
    :title='$t("strings.add_file_to_category")',
    @hide='handleClose',
    @ok.prevent='handleOk',
  )
    b-form
      b-row
        b-col
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
