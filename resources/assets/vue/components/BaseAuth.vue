<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component
export default class BaseAuth extends Vue {
}
</script>

<template lang="pug">
.div
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
    
  router-view.router-view

</template>

<style lang="scss" scoped>
#navbar{
  width: 100%;
  position:fixed;
  z-index: 2;
  background:rgba(255,255,255,.98);
  top:0px
}

.router-view {
  top:0px;
  height: 100%;
  width:100%;
  position:absolute;
  background:  url("/images/delivery.svg") no-repeat center / cover;
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
