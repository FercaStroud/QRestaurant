<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { Action } from 'vuex-class';

import dialog from '@/utils/dialog';
import formValidation from '@/utils/formValidation';
import checkResponse from '@/utils/checkResponse';

@Component
export default class AuthRegister extends Vue {
  @Action setDialogMessage;

  form = {};
  isSending = false;

  async doRegister() {
    await this.$auth.register({
      params: this.form,
      redirect: false,
      success: (response) => {
        const checkErrors = checkResponse(response);

        if (checkErrors) {
          this.setDialogMessage(checkErrors.message);
          return;
        }

        this.setDialogMessage('login.account_created');

        this.$router.push({ name: 'auth.login' });
      },
    });
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
b-form(@submit='register')
  .title.font-caveat(style={fontSize:'2em'}) {{ $t('login.register') }}

  b-form-group(
    :label='$t("strings.user_name")'
    label-for='user_name',
  )
    b-form-input#user_name(
      type='text',
      v-model='form.user_name',
      maxlength=191,
      required,
    )

  b-form-group(
    :label='$t("strings.restaurant_name")'
    label-for='restaurant_name',
  )
    b-form-input#restaurant_name(
      type='text',
      v-model='form.restaurant_name',
      maxlength=191,
      required,
    )

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

  b-form-group(
    :label='$t("strings.phone")'
    label-for='phone',
  )
    b-form-input(
      type='number',
      v-model='form.phone',
      name='phone',
      min='0',
      maxlength='20',
      required,
    )

  b-form-group(
    :label='$t("strings.city")'
    label-for='city',
  )
    b-form-input#city(
      type='text',
      v-model='form.city',
      maxlength=40,
      required,
    )

  b-form-group(
    :label='$t("strings.state")'
    label-for='city',
  )
    b-form-input#state(
      type='text',
      v-model='form.state',
      maxlength=40,
      required,
    )

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

  b-form-group
    b-button(
      @click=""
      variant='warning',
    ) {{ $t('strings.cancel') }}

  b-form-group
    b-button(
      type='submit',
      variant='primary',
      :class='{ disabled: isSending }',
    ) {{ $t('login.register') }}
</template>
