<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import {Action, namespace} from 'vuex-class';
import PaymentList from '@/components/payments/PaymentList.vue';
import PaymentStatus from '@/components/payments/PaymentStatus.vue';

const pStore = namespace('payments');

@Component(
  {
    components: {PaymentStatus, PaymentList}
  }
)
export default class Payments extends Vue {
  @Action setBackUrl;
  @Action setMenu;

  mounted() {
    this.setBackUrl('/dashboard');
    this.setMenu([]);
  }

}
</script>

<template lang="pug">
  b-container(fluid="")
    b-row(style="margin-bottom:20px")
      b-col
        h2 {{ $t('payments.service_status') }}
        PaymentStatus
    b-row
      b-col
        h2 {{ $t('payments.title') }}
        PaymentList


</template>
