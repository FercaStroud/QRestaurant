<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { Action } from 'vuex-class';

import dialog from '@/utils/dialog';
import HomeCard from '@/components/HomeCard.vue';

// TODO change
@Component({
  components: {
    HomeCard,
  },
})
export default class Home extends Vue {
  @Action setBackUrl;
  @Action setMenu;
  @Action setDialogMessage;

  darkColor = '#000000';

  mounted() {
    this.setBackUrl('/');
    this.setMenu([
      {
        text: 'menus.title',
        key: 1,
        handler: () => {
          this.$router.push({path: '/menus'})
        },
      },
      /*{{
      text: 'products.text',
      key: 1,
      handler: () => {
        this.$router.push({path: '/products'})
      },
    }, {
      text: 'categories.text',
      key: 2,
      handler: () => {
        this.$router.push({path: '/categories'})
      },*/
    ]);
  }

  downloadImage() {
    let imagesrc;
    imagesrc = <HTMLElement>document.querySelector("#QR-CODE");

    const downloadImage = (name, content, type) => {
      let link = document.createElement('a');
      link.href = content;
      link.download = /\.\w+/.test(name) ? name : `${name}.${type}`;

      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    };
    downloadImage('QRCode', imagesrc.getAttribute("src"), 'png');

  }

  get actualUser() {
    return this.$auth.user();
  }
}
</script>

<template lang="pug">
b-container(tag='main' fluid)
  router-view(:style="{marginTop:'30px',}" v-if='$auth.ready()')
<!--  b-row-->
<!--    b-col(md="12" )-->
<!--      //h2 {{ $t('dashboard.your_code') }}-->
<!--      //.color-primary() {{ 'q-restaurant.com/menu/' + actualUser.id }}-->

<!--  b-row(style="margin-top:40px")-->
<!--    b-col(md="4")-->
<!--      b-card-->
<!--        b-form-group(-->
<!--          label='Color'-->
<!--          label-for='color',-->
<!--        )-->
<!--          b-form-input#color(-->
<!--            type='text',-->
<!--            v-model='darkColor',-->
<!--            maxlength='7',-->
<!--            required,-->
<!--          )-->
<!--        b-card-footer-->
<!--          b-btn.bg-primary(-->
<!--            style="width:100%", @click="downloadImage"-->
<!--          ) {{ $t('strings.download') }}-->
<!--    b-col(md="8"  sm="12")-->
<!--      b-card-->
<!--        qrcode(-->
<!--          id="QR-CODE"-->
<!--          :value=" 'https://q-restaurant.com/menu/' + actualUser.id",-->
<!--          tag="img",-->
<!--          :options="{ width: 1080,  color: { dark: darkColor, light: '#0000' }, }"-->
<!--        )-->



</template>
<style lang="scss" scoped>
  #QR-CODE{
    width: 100%;
  }
</style>
