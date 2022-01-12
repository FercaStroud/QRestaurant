<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { Action, namespace } from 'vuex-class';

import PaymentList from './components/PaymentList.vue';

@Component({components: {PaymentList,},})

export default class Payments extends Vue {
  @Action setBackUrl;
  @Action setMenu;

  async created() {
    this.setBackUrl('/');
    this.setMenu([]);
  }

}
</script>

<template lang="pug">
  b-container.pt-5(fluid="")
    .clearfix.pt-5
    b-row
      b-col.mt-3
        h2 {{ $t('payments.title') }}
        PaymentList
</template>
