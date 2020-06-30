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

  urlHost;

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
    this.urlHost = window.location.host;

  }

  get actualUser() {
    return this.$auth.user();
  }
}
</script>

<template lang="pug">
b-container(tag='main')
  p {{ $t('dashboard.dashboard_description') }}
  b-row
    b-col
      h2 {{ $t('dashboard.your_code') }}
      p URL: {{ urlHost + '/menu/' + actualUser.id }}
      qrcode(:value="urlHost + '/menu/' + actualUser.id", tag="img", :options="{ width: 500 }")
</template>
