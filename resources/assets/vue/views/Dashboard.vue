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
    this.setMenu([{
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
      },
    }]);
  }

  get actualUser() {
    return this.$auth.user();
  }
}
</script>

<template lang="pug">
b-container(tag='main')
  b-row
    b-col
      div
        h2 {{ $t('dashboard.your_code') }}
        a(
          :href="'https://q-restaurant.com/menu/' + actualUser.id", target="_blank"
        ) URL: {{ 'q-restaurant.com/menu/' + actualUser.id }}

      b-form-group(
        label='Color'
        label-for='color',
      )
        b-form-input#color(
          type='text',
          v-model='darkColor',
          maxlength='7',
          required,
        )
      qrcode(
        :value=" 'https://q-restaurant.com/menu/' + actualUser.id",
        tag="img",
        :options="{ width: 500,  color: { dark: darkColor, light: '#0000' }, }"
      )
</template>
