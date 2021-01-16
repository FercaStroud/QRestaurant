<script lang="ts">
import { Component, Vue, Watch } from 'vue-property-decorator';
import { Action, State, namespace } from 'vuex-class';

import dialog from '@/utils/dialog';
const pStore = namespace('payments');

@Component(
  {
    components: {
    },
  }
)

export default class PaymentList extends Vue {

  @pStore.State payments;
  @pStore.State fields;
  @pStore.State isLoading;
  @pStore.Action loadPayments;

  mounted() {
    this.$nextTick(() => {
      //this.getPayments(this.actualUser.id);
    })
  }

  get actualUser() {
    return this.$auth.user();
  }

  async getPayments(user_id: number): Promise<void> {
    this.loadPayments({ user_id });
  }
}
</script>

<template lang="pug">
  div
    b-table.btable(
      style="max-height:600px"
      sort-icon-left
      striped
      responsive
      hover
      sticky-header
      head-variant="dark"
      :busy="isLoading"
      :items="payments"
      :fields="fields"
    )

      template(v-slot:table-busy)
        div.text-center.text-danger
          b-spinner.align-middle

      template(v-slot:head(user_name)="data")
        .text-nowrap {{$t("strings.user_name")}}
      template(v-slot:head(status)="data")
        .text-nowrap {{$t("payments.status")}}
      template(v-slot:head(payment_details)="data")
        .text-nowrap {{$t("payments.details")}}
      template(v-slot:head(created_at)="data")
        .text-nowrap {{$t("strings.created_at")}}
      template(v-slot:head(updated_at)="data")
        .text-nowrap {{$t("strings.updated_at")}}
      template(v-slot:head(actions)="data")
        .text-nowrap {{$t("strings.actions")}}

      template( v-slot:cell(index)="data")
        .text-nowrap {{ data.index + 1 }}


</template>

<style scoped>

</style>
