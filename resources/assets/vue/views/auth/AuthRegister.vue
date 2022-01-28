<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import {Action} from 'vuex-class';

import dialog from '@/utils/dialog';
import formValidation from '@/utils/formValidation';
import checkResponse from '@/utils/checkResponse';

@Component
export default class AuthRegister extends Vue {
  @Action setDialogMessage;

  form = {};
  isSending = false;

  async doRegister() {
    const response = await this.axios.post('register', this.form);

    const checkErrors = checkResponse(response);

    if (checkErrors) {
      this.setDialogMessage(checkErrors.message);
      return;
    }

    this.setDialogMessage('login.account_created');

    window.location.reload();
    //this.$router.push({name: 'auth.login'});
  }

  async register(evt: Event) {
    if (!formValidation(evt)) return;

    this.isSending = true;

    try {
      await this.doRegister();
    } catch {
      this.setDialogMessage('errors.generic_error');
    }

    this.isSending = false;
  }
}
</script>

<template lang="pug">
  b-container
    div(style="height:70px")
    b-row
      b-col.shadow.glass-effect
        div
          router-link(to='/')
            img(
              src='/assets/images/qr1.svg',
              alt='Logo QRestaurant'
              style="width:150px;position:relative;left:50%;margin-left:-75px"
            )
        .font-caveat.text-muted.size-for-titles {{ $t('login.register') }}
        b-form(@submit='register')
          b-row
            b-col(md="4")
              b-form-group(
                :label='$t("strings.name")'
                label-for='name',
              )
                b-form-input#name(
                  type='text',
                  v-model='form.name',
                  maxlength='25',
                  required,
                  autofocus,
                )
            b-col(md="4")
              b-form-group(
                :label='$t("strings.lastname")'
                label-for='lastname',
              )
                b-form-input#lastname(
                  type='text',
                  v-model='form.lastname',
                  maxlength='15',
                  required,
                  autofocus,
                )
            b-col(md="4")
              b-form-group(
                :label='$t("strings.second_lastname")'
                label-for='second_lastname',
              )
                b-form-input#second_lastname(
                  type='text',
                  v-model='form.second_lastname',
                  maxlength='15',
                  autofocus,
                )
            b-col(md="3")
              b-form-group(
                :label='$t("strings.phone")'
                label-for='phone',
              )
                b-form-input#phone(
                  type='text',
                  v-model='form.phone',
                  maxlength='20',
                  autofocus,
                  required,
                )
            b-col(md="9")
              b-form-group(
                :label='$t("strings.restaurant_name")'
                label-for='restaurant_name',
              )
                b-form-input#restaurant_name(
                  type='text',
                  v-model='form.restaurant_name',
                  maxlength='50',
                  autofocus,
                  required,
                )
            b-col(md="12")
              hr
            b-col(md="8")
              b-form-group(
                :label='$t("strings.address")'
                label-for='address',
              )
                b-form-input#address(
                  type='text',
                  v-model='form.address',
                  maxlength='400',
                  autofocus,
                )
            b-col(md="4")
              b-form-group(
                :label='$t("strings.state")'
                label-for='state',
              )
                b-form-input#state(
                  type='text',
                  v-model='form.state',
                  maxlength='75',
                  autofocus,
                  required,
                )
            b-col(md="4")
              b-form-group(
                :label='$t("strings.municipality")'
                label-for='municipality',
              )
                b-form-input#municipality(
                  type='text',
                  v-model='form.municipality',
                  maxlength='75',
                  autofocus,
                  required,
                )
            b-col(md="4")
              b-form-group(
                :label='$t("strings.city")'
                label-for='city',
              )
                b-form-input#city(
                  type='text',
                  v-model='form.city',
                  maxlength='75',
                  autofocus,
                  required,
                )
            b-col(md="4")
              b-form-group(
                :label='$t("strings.country")'
                label-for='country',
              )
                b-form-input#country(
                  type='text',
                  v-model='form.country',
                  maxlength='75',
                  autofocus,
                  required,
                )
            b-col(md="12")
              hr
            b-col(md="4")
              b-form-group(
                :label='$t("strings.email")'
                label-for='email',
              )
                b-form-input(
                  type='email',
                  v-model='form.email',
                  name='email',
                  maxlength='191',
                  required,
                )
            b-col(md="4")
              b-form-group(
                :label='$t("strings.password")'
                label-for='password',
              )
                b-form-input(
                  type='password',
                  v-model='form.password',
                  name='password',
                  required,
                )
            b-col(md="4")
              b-form-group(
                :label='$t("settings.password_confirmation")'
                label-for='password_confirmation',
              )
                b-form-input(
                  type='password',
                  v-model='form.password_confirmation',
                  name='password_confirmation',
                  required,
                )
            b-col(md="12")
              b-form-group
                b-button(
                  type='submit',
                  block
                  variant='primary',
                  :class='{ disabled: isSending }',
                ) {{ $t('login.register') }}
    div(style="height:70px")
</template>
