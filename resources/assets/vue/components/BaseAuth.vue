<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component
export default class BaseAuth extends Vue {
}
</script>

<template lang="pug">
div
  b-navbar#navbar(
    :toggleable="'md'"
  )
    b-navbar-brand
      img(
        style="width:48px"
        src='/images/qr1.svg',
        alt='Logo QRestaurant'
      )
      div(style="float: right;margin-top: 2px;")
        span.Gotham-Black.color-primary(style="font-size:1.3em;color:") Q-R
        span.Gotham-Medium.color-secondary(style="font-size:1.3em") estaurant
    b-navbar-toggle(target="nav-collapse")
    b-collapse#nav-collapse(is-nav)
      b-navbar-nav(class="ml-auto")
        b-nav-item
          router-link(to='/login') {{ $t('login.login') }}
        b-nav-item
          router-link(to='/registrations/new') {{ $t('login.register') }}
  .container-fluid
    router-view.router-view

</template>

<style lang="scss" scoped>
#navbar{
  width: 100%;
  position:fixed;
  z-index: 2;
  background:rgba(255,255,255,.98)
}
.container-fluid {
  top:0px;
  position: absolute;
  height: 100%;
  background: linear-gradient(rgba(255, 255, 255, 0.0), rgba(255, 255, 255, 0.0)), url("/images/delivery.svg") no-repeat center / cover;
}

form {
  margin-left: auto;
  margin-right: auto;
  margin-top: 35px;
  max-width: 380px;
}

@media (min-width: 768px) {

}
</style>
