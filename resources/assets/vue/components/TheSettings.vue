<script lang="ts">
  import {Component, Vue} from 'vue-property-decorator';
  import {State, Action} from 'vuex-class';

  import {AxiosResponse} from 'axios';

  import checkPassword from '@/utils/checkPassword';
  import checkResponse from '@/utils/checkResponse';
  import dialog from '@/utils/dialog';

  @Component
  export default class TheSettings extends Vue {
    @State settings;
    @Action setDialogMessage;

    isSending = false;
    okText = 'buttons.save';

    get userType() {
      return this.$auth.user().type_id;
    }
    get userAddress() {
      return this.$auth.user().address;
    }
    get userName() {
      return this.$auth.user().name;
    }

    mounted(){
      let vm = this;
      this.$nextTick(function () {
        this.settings.address = vm.userAddress
        this.settings.name = vm.userName
        this.settings.password = '';
        this.settings.password_confirmation = '';
      })
    }

    async handleOk() {
      if (!checkPassword(this.settings)) {
        return;
      }

      const response = await this.postData();
      const checkErrors = checkResponse(response);

      if (checkErrors) {
        this.setDialogMessage(checkErrors.message);
        return;
      }

      (<any>this.$refs.modal).hide();
    }

    onModalHidden(): void {
      this.settings.password = '';
      this.settings.password_confirmation = '';
    }

    async postData(): Promise<any> {
      this.isSending = true;
      this.okText = 'buttons.sending';

      let response: AxiosResponse<any>;
      const formData = new FormData();
      formData.append('address', this.settings.address);
      formData.append('name', this.settings.name);
      formData.append('image_src', this.settings.image_src);
      formData.append('logo_src', this.settings.logo_photo);
      formData.append('password', this.settings.password);
      formData.append('password_confirmation', this.settings.password_confirmation);

      try {
        response = await this.axios.post('settings', formData);
      } catch {
        this.resetState();

        this.setDialogMessage('errors.generic_error');

        return null;
      }

      this.resetState();

      return response;
    }

    resetState() {
      this.isSending = false;
      this.okText = 'buttons.save';
    }
  }
</script>

<template lang="pug">
  b-modal(
    size="xl"
    hide-header-close=true,
    ref='modal',
    :cancel-title='$t("buttons.cancel")',
    :ok-disabled='isSending',
    :ok-title='$t(okText)',
    :title='$t("strings.settings")',
    @hidden='onModalHidden',
    @ok.prevent='handleOk'
  )
    b-form(style="margin-top:20px")
      b-form-group(
        v-if='userType === 1',
        :label='$t("strings.example")'
        label-for='example',
      )
        b-form-input#example(
          type='text',
          v-model='settings.example',
          maxlength=191,
          required,
        )
      b-form-group(
        :label='$t("strings.name")'
        label-for='name',
      )
        b-form-input#name(
          type='text',
          v-model='settings.name',
          maxlength=191,
          required,
        )
      b-form-group(
        :label='$t("strings.address")'
        label-for='description',
      )
        b-form-textarea#address(
          type='text',
          v-model='settings.address',
        )

      b-form-group(
        :label='$t("settings.cover_photo")'
        label-for='image_src',
      )
        b-form-file#image_src(
          type='text',
          accept="image/*",
          :browse-text='$t("strings.browse")',
          :state="Boolean(settings.image_src)"
          v-model='settings.image_src',
          :placeholder='$t("strings.choose_img")'
          :drop-placeholder='$t("strings.drop_img")'
        )

      b-form-group(
        :label='$t("settings.logo_photo")'
        label-for='logo_src',
      )
        b-form-file#logo_src(
          type='text',
          accept="image/*",
          :browse-text='$t("strings.browse")',
          :state="Boolean(settings.logo_photo)"
          v-model='settings.logo_photo',
          :placeholder='$t("strings.choose_img")'
          :drop-placeholder='$t("strings.drop_img")'
        )

      b-form-group(
        :label='$t("strings.password")'
        label-for='settings-password',
      )
        b-form-input#settings-password(
          type='password',
          v-model='settings.password',
          maxlength=191,
        )
      b-form-group(
        :label='$t("settings.password_confirmation")'
        label-for='settings-password_confirmation',
      )
        b-form-input#settings-password_confirmation(
          type='password',
          v-model='settings.password_confirmation',
          maxlength=191,
        )
</template>
