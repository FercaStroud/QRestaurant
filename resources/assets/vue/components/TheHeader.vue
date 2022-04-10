<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import {State, namespace} from 'vuex-class';
import {BIconArrowLeftShort, BIconGithub} from 'bootstrap-vue';

import TheMessageBadge from '../views/messages/components/TheMessageBadge.vue';

const aStore = namespace('auth');

@Component({
             components: {
               TheMessageBadge,
               BIconArrowLeftShort,
               BIconGithub,
             },
           })
export default class TheHeader extends Vue {
  @State backUrl;
  @State menu;
  @aStore.State user;
  @aStore.Action logout;

  paddingNavbar: string = '5px 10px';
  widthBrandingLogo: string = '60px';
  widthBrandingText: string = '1.4em';

  mounted() {
    window.addEventListener('scroll', this.handleScroll);
  }

  beforeDestroy() {
    window.removeEventListener('scroll', this.handleScroll);
  }

  handleScroll(event) {

    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
      this.paddingNavbar = '0px 10px';
      this.widthBrandingLogo = '48px';
      this.widthBrandingText = '1em';
    } else {
      this.paddingNavbar = '5px 10px';
      this.widthBrandingLogo = '60px';
      this.widthBrandingText = '1.4em';
    }
  }

  get homePath() {
    return this.user.home_path;
  }

  get path(): string {
    return this.$route.name || '';
  }
}
</script>

<template lang="pug">
  div
    b-navbar.navbar-expand-lg.bg-light.shadow.public-navbar(
      toggleable='lg'
      :style="{padding: paddingNavbar}"
    )
      b-navbar-brand(href='#')
        router-link(to='/')
          img.branding-logo(
            :style="{width: widthBrandingLogo}"
            src='/assets/images/qr1.svg',
            alt='Logo QRestaurant'
          )
          div(style="margin-top: 4px;")
            span.Gotham-Black.color-primary.branding-text(
              :style="{fontSize: widthBrandingText}"
            ) Q-R
            span.Gotham-Medium.color-secondary.branding-text(
              :style="{fontSize: widthBrandingText}"
            ) estaurant

      b-navbar-toggle(target='nav-collapse')
      b-collapse#nav-collapse(is-nav='')

        // Right aligned nav items
        b-navbar-nav.ml-auto
          b-nav-item.border-navigator(
            v-if="user.type_id === 2"
          ) {{ $t('strings.welcome') }}, {{ user.name }} {{ user.lastname }}

          b-nav-item.menu(
            v-for='item in menu',
            :key='item.key',
            @click.prevent='item.handler',
            href='#',
            style="border: 1px solid #ff6a00;"
          ) {{ $t(item.text) }}

          b-nav-item.border-navigator(
            v-if="user.type_id === 2"
            to="/menus"
          ) {{ $t('strings.menus') }}

          b-nav-item.border-navigator(
            v-if="user.type_id === 2"
            to="/user/payments"
          ) {{ $t('strings.payments') }}

          b-nav-item.border-navigator(
            v-if="user.type_id === 2"
            to="/user/settings"
          ) {{ $t('strings.settings') }}

          b-nav-item.border-navigator(
            v-if="user.type_id !== undefined"
            @click='logout',
          )  {{ $t('home.logout') }}

        b-navbar-nav
          b-nav-item(v-if="user.type_id === undefined")
            router-link(to='/login') {{ $t('login.login') }}
          b-nav-item(v-if="user.type_id === undefined")
            router-link(to='/registrations/new') {{ $t('buttons.register') }}
        b-nav-form(v-if="user.type_id === undefined")
          b-form-input.mr-sm-2#input-search(size='sm' placeholder='Encuentra tu restaurante favorito')
          b-button.my-2.my-sm-0.btn-primary(size='sm' type='submit') {{ $t('buttons.search') }}
</template>

<style scoped lang="scss">
$primary_color: #ff6a00;

#input-search {
  width: 300px;

  &::placeholder {
    font-size: .9em;
  }
}

.nav-link {
  font-size: 1em;

  &:hover {
    color: $primary_color !important;
  }
}

.btn {
  &:hover {
    border: 1px solid $primary_color;
    background-color: $primary_color;
    color: #fff !important;
  }
}

/*NAVBAR STYLES*/
.public-navbar {
  overflow: hidden;
  background-color: #fff;
  transition: 0.4s;
  position: fixed;
  width: 100%;
  top: 0;
  z-index: 99;
  box-shadow: 0px 1px 10px #3f3f3f;
}

.branding-logo {
  transition: 0.4s;
  float: left;
}

.branding-text {
  transition: 0.4s;
}
</style>
