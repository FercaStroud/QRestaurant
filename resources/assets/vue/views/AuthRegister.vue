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
.welcome
  b-row#fix-top(
    style=""
  )
    b-col(lg="9" md="12" sm="12")
      b-card(style="border:none;background:rgba(255,255,255,.98)")
        b-row
          b-col(md="4")
            img(
              style="width:100%;margin-top:70px"
              src='/images/qr1.svg',
              alt='Logo QRestaurant'
            )
            div(style="text-align:center")
              span.Gotham-Black.color-primary(style="font-size:1.6em;color:") Q-R
              span.Gotham-Medium.color-secondary(style="font-size:1.6em") estaurant
          b-col(md="8")
            .color-secondary(style="font-size:2em;text-align:center") {{ $t('login.register') }}
            .color-secondary(style="font-size:.9em;text-align:center;margin:15px") {{ $t('login.description') }}

            b-form(@submit='register')
              b-row
                b-col(md="6" sm="12")
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
                b-col(md="6" sm="12")
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

                b-col(md="8" sm="12")
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

                b-col(md="4" sm="12")
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

                b-col(md="6" sm="12")
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

                b-col(md="6" sm="12")
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

                b-col(md="6" sm="12")
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

                b-col(md="6" sm="12")
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

                b-col(md="6" sm="12")
                  b-form-group
                    b-button(
                      style="width:100%"
                      to='/login',
                    ) {{ $t('strings.cancel') }}

                b-col(md="6" sm="12")
                  b-form-group
                    b-button(
                      style="width:100%"
                      type='submit',
                      variant='primary',
                      :class='{ disabled: isSending }',
                    ) {{ $t('login.register') }}
</template>

<style scoped>

 #fix-top{
   margin-top:150px;
   margin-left:9px;
 }
@media (max-width:767px) {
  #fix-top{
    margin-top:0px;
    margin-left:0px;
  }
}
</style>
