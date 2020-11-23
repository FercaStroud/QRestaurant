<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component
export default class BaseAuth extends Vue {

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
.div
  router-view.router-view

</template>

<style lang="scss" scoped>
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
