<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import {Action, State} from 'vuex-class';

@Component({
  components: {},
})

export default class Landing extends Vue {
  @Action setBackUrl;
  @Action setMenu;

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

}
</script>

<template lang="pug">
  div.random-pattern()
    b-navbar.public-navbar(
      toggleable='lg'
      :style="{padding: paddingNavbar}"
    )
      b-navbar-brand(href='#')
        img.branding-logo(
          :style="{width: widthBrandingLogo}"
          src='/images/qr1.svg',
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
          b-navbar-nav
            b-nav-item(href='#') ¡Regístrate!
            b-nav-item(href='#') Iniciar Sesión

          b-nav-form
            b-form-input.mr-sm-2#input-search(size='sm' placeholder='Encuentra tu restaurante favorito')
            b-button.my-2.my-sm-0(size='sm' type='submit') Buscar

    div.header
      img(
        style=""
        src='/images/banner-home.jpg',
        alt='Header Image'
      )
    div.header
      img(
        style=""
        src='/images/banner-home.jpg',
        alt='Header Image'
      )
    div.header
      img(
        style=""
        src='/images/banner-home.jpg',
        alt='Header Image'
      )
    b-container#footer(style={backgroundColor: '#393939', padding: '20px', marginTop: '50px'}, fluid="" )
      a(
        target="_blank"
        href="https://www.appsgorilasonline.com/"
        style={color: 'white'}
      ) By Gorilas Online


</template>

<style lang="scss">
$primary_color: #ff6a00;
.app {
  background-image: url("/images/food_pattern_00.jpg");
  background-size: 400px;
}

#input-search {
  width: 300px;

  &::placeholder {
    font-size: .9em;
  }
}

.nav-link {
  font-size: .9em;

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

.header {
  img {
    width: 100%;
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
}

.branding-logo {
  transition: 0.4s;
  float: left;
}

.branding-text {
  transition: 0.4s;
}
</style>
