<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import {Action, State, namespace} from 'vuex-class';

const pStore = namespace('payments');

@Component({components: {}})

export default class PaymentList extends Vue {
  @pStore.State payments;
  @pStore.State fields;
  @pStore.State isLoading;
  @pStore.Action loadPayments;
  search = '';

  async created() {
      await this.loadPayments();
  }

  get actualUser() {
    return this.$store.state.auth.user;
  }

  async getPayments(): Promise<void> {
    this.loadPayments();
  }

}

</script>

<template lang="pug">
  div
    b-form-input#search.mb-2(
      type="search"
      v-model='search',
      :placeholder='$t("strings.search")'
      style="width:230px;float:right"
    )

    b-button(
      style="margin-bottom: 5px;"
      @click="getPayments"
      size="sm"
      variant="dark"
    ) {{ $t('strings.update_table') }}

    b-table.btable(
      style="max-height: calc(100vh - 300px);"
      hover
      responsive
      sticky-header
      no-border-collapse
      striped
      outlined
      head-variant="dark"
      :busy="isLoading"
      :items="payments"
      :fields="fields"
      select-mode="single"
      :filter="search"
      small
    )

      template(#table-busy)
        div.text-center.text-danger
          b-spinner.align-middle

      template(v-slot:head(user_id)="data")
        span {{$t("payments.user_id")}}
      template(v-slot:head(price)="data")
        span {{$t("payments.price")}}
      template(v-slot:head(total)="data")
        span {{$t("payments.total")}}
      template(v-slot:head(collection_id)="data")
        span {{$t("payments.collection_id")}}
      template(v-slot:head(collection_status)="data")
        span {{$t("payments.collection_status")}}
      template(v-slot:head(payment_id)="data")
        span {{$t("payments.payment_id")}}
      template(v-slot:head(status)="data")
        span {{$t("payments.status")}}
      template(v-slot:head(payment_type)="data")
        span {{$t("payments.payment_type")}}
      template(v-slot:head(external_reference)="data")
        span {{$t("payments.external_reference")}}
      template(v-slot:head(merchant_order_id)="data")
        span {{$t("payments.merchant_order_id")}}
      template(v-slot:head(preference_id)="data")
        span {{$t("payments.preference_id")}}
      template(v-slot:head(site_id)="data")
        span {{$t("payments.site_id")}}
      template(v-slot:head(processing_mode)="data")
        span {{$t("payments.processing_mode")}}
      template(v-slot:head(merchant_account_id)="data")
        span {{$t("payments.merchant_account_id")}}
      template(v-slot:head(feedback_status)="data")
        span {{$t("payments.feedback_status")}}
      template(v-slot:head(preference_status)="data")
        span {{$t("payments.preference_status")}}
      template(v-slot:head(start_date)="data")
        span {{$t("strings.start_date")}}
      template(v-slot:head(end_date)="data")
        span {{$t("strings.end_date")}}
      template(v-slot:head(created_at)="data")
        span {{$t("strings.created_at")}}


      template(v-slot:cell(start_date)="data")
        span {{ data.item.start_date | moment("D, MMMM YYYY") }}
      template(v-slot:cell(end_date)="data")
        span {{ data.item.end_date | moment("D, MMMM YYYY") }}
      template(v-slot:cell(created_at)="data")
        span {{ data.item.created_at | moment("D, MMMM YYYY") }}

      template(v-slot:cell(index)="data")
        span {{ data.index + 1 }}

</template>

<style lang="scss" scoped>

</style>
