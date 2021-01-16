<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { Action, State, namespace } from 'vuex-class';

//const pStore = namespace('payments');

@Component(
  {
    components: {
    },
  }
)

export default class PaymentList extends Vue {
  //@pStore.State isLoading;
  //@pStore.Action loadPaymentStatus;

  mounted() {
    this.$nextTick(() => {
      //this.getPayments(this.actualUser.id);
    })
  }

  get actualUser() {
    return this.$auth.user();
  }

}
</script>

<template lang="pug">
  div
    strong {{ $t('payments.status') }}:




</template>

<style scoped>

</style>
