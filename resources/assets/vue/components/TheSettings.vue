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

  }

  async handleOk() {
    let boolSize = true;
    console.log(this.settings)
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
    formData.append('user_name', this.$auth.user().user_name);
    formData.append('restaurant_name', this.$auth.user().restaurant_name);
    formData.append('city', this.$auth.user().city);
    formData.append('state', this.$auth.user().state);
    formData.append('phone', this.$auth.user().phone);
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
      b-row
        b-col(md="6" sm="12")
          b-form-group(
            :label='$t("strings.user_name")'
            label-for='user_name',
          )
            b-form-input#user_name(
              type='text',
              v-model='$auth.user().user_name',
              maxlength=191,
              required,
            )
        b-col(md="6" sm="12")
          b-form-group(
            :label='$t("strings.restaurant_name")'
            label-for='restaurant_name',
          )
            b-form-input#restaurant_name(
              type='text',
              v-model='$auth.user().restaurant_name',
              maxlength=191,
              required,
            )

        b-col(md="4" sm="12")
          b-form-group(
            :label='$t("strings.phone")'
            label-for='phone',
          )
            b-form-input(
              type='number',
              v-model='$auth.user().phone',
              name='phone',
              min='0',
              maxlength='20',
              required,
            )

        b-col(md="4" sm="12")
          b-form-group(
            :label='$t("strings.city")'
            label-for='city',
          )
            b-form-input#city(
              type='text',
              v-model='$auth.user().city',
              maxlength=40,
              required,
            )

        b-col(md="4" sm="12")
          b-form-group(
            :label='$t("strings.state")'
            label-for='city',
          )
            b-form-input#state(
              type='text',
              v-model='$auth.user().state',
              maxlength=40,
              required,
            )

        b-col(md="12" sm="12")
          b-form-group(
            :label='$t("settings.logo_photo")'
            label-for='logo_src',
            description="Se recomiendan las siguientes medidas W500px / H500px"
          )
            b-row
              b-col(md="2" sm="12")
                div.square-logo(
                  v-if="$auth.user().logo_src"
                  style="height: 108px;background-size: contain;background-repeat: no-repeat;"
                  :style="{backgroundImage: 'url(/uploads/images/logos/'+$auth.user().logo_src+')'}"
                )
              b-col(md="12" sm="12")
                b-form-file#logo_src(
                  type='text',
                  accept="image/*",
                  :browse-text='$t("strings.browse")',
                  :state="Boolean(settings.logo_photo)"
                  v-model='settings.logo_photo',
                  :placeholder='$t("strings.choose_img")'
                  :drop-placeholder='$t("strings.drop_img")'
                )

        b-col(md="6" sm="12")
          b-form-group(
            :label='$t("strings.password")'
            label-for='password',
          )
            b-form-input(
              type='password',
              v-model='settings.password',
              name='password',
              required,
            )

        b-col(md="6" sm="12")
          b-form-group(
            :label='$t("settings.password_confirmation")'
            label-for='password_confirmation',
          )
            b-form-input(
              type='password',
              v-model='settings.password_confirmation',
              name='password_confirmation',
              required,
            )
</template>
