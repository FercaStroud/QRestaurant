<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { Action } from 'vuex-class';

import dialog from '@/utils/dialog';
import formValidation from '@/utils/formValidation';

@Component
export default class AuthLogin extends Vue {
  @Action loadData;
  @Action setDialogMessage;

  form = {
    rememberMe: true,
  };
  authError = false;
  isSending = false;

  async doLogin() {
    await this.$auth.login({
      data: this.form,
      rememberMe: this.form.rememberMe,
      success(response) {
        const { status } = response;

        if (status === 401) {
          this.authError = true;
        }

        this.loadData();
      },
    });
  }

  async login(evt: Event) {
    if (!formValidation(evt)) return;

    this.isSending = true;

    try {
      await this.doLogin();
      //this.$router.push({ path: '/dashboard' });
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
    b-col(md="7")
      b-card(style="border:none;background:rgba(255,255,255,.98)")
        b-row
          b-col(md="4")
            img(
              style="width:100%;margin-top:100px"
              src='/images/qr1.svg'
              alt='Logo QRestaurant'
            )
            div(style="text-align:center")
              span.Gotham-Black.color-primary(style="font-size:1.6em;color:") Q-R
              span.Gotham-Medium.color-secondary(style="font-size:1.6em") estaurant
          b-col(md="8")
            .Gotham-Medium.color-secondary(style="font-size:2em;text-align:center") {{ $t('login.login') }}
            b-form#login(@submit='login')
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
                  autofocus,
                )
                span.help-block(v-if='authError')
                  strong {{ $t('auth.failed') }}

              b-form-group(
                :label='$t("strings.password")'
                label-for='password',
              )
                b-form-input(
                  type='password',
                  v-model='form.password',
                  required,
                )

              b-form-group#boxes
                .d-flex.justify-content-between.align-items-center
                  b-form-checkbox(
                    v-model='form.rememberMe',
                    checked-value=true,
                    unchecked-value=false,
                  ) {{ $t('login.keep_connected') }}

                  b-button.content-vertical.text-secondary(variant='link', to='/password/reset')
                    v-icon(name='question-circle')
                    | &nbsp;{{ $t('login.forgot_password') }}

              .d-flex.justify-content-between(style="margin-bottom:70px")
                b-button.btn-primary(style={width:'180px'})(
                  type='submit',
                  :class='{ disabled: isSending }',
                ) {{ $t('login.login') }}

                b-button.btn-primary(style={width:'180px'})(
                  to='/registrations/new',
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
