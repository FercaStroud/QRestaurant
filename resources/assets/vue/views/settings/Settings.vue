<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import {Action, namespace} from 'vuex-class';
import axios from "axios";

const pStore = namespace('payments');
const uStore = namespace('auth');

@Component(
  {
    components: {}
  }
)
export default class Products extends Vue {
  @Action setBackUrl;
  @Action setMenu;
  @uStore.State user;
  @pStore.State paymentStatus;
  @pStore.State isLoading;
  @pStore.Action loadPaymentStatus;
  @pStore.Action setLoading;

  mounted() {
    this.setBackUrl('/');
    this.setMenu([]);

    this.getPaymentStatus();
  }

  async getPaymentStatus(): Promise<void> {
    this.loadPaymentStatus();
  }

  async checkout(): Promise<void> {
    try {
      this.setLoading(true);
      const response = await axios.post('checkout');
      console.log(response);
      const mp = new window["MercadoPago"](
        this.$store.state.MP_TOKEN, {
          locale: 'es-MX'
        }
      );
      await mp.checkout(
        {
          preference: {
            id: response.data.id
          },
          render: {
            container: '.mp-container',
            label: this.$t('strings.checkout'),
          },
          autoOpen: true,
        }
      );
    } catch {
      this.$bvToast.toast('', {
        title: this.$t('errors.generic_error'),
        variant: 'danger',
        toaster: 'b-toaster-top-center',
        solid: true
      });
    } finally {
      this.setLoading(false);
    }
  }
}
</script>

<template lang="pug">
  b-container.pt-5(fluid="")
    .clearfix.pt-5
    .mp-container
    b-row
      b-col(md="3")
        h2 {{ $t('strings.settings') }}
        strong {{ $t('strings.payment_status') }}:
        span.text-danger.font-weight-bolder(v-if="!paymentStatus") {{ $t('strings.payment_status_false') }}
        span.font-weight-bolder.text-success(v-else) {{ $t('strings.payment_status_true') }}

    b-row(v-if="!paymentStatus" )
      b-col(md="3")
        b-button.mt-3(
          v-if="!isLoading"
          style="margin-bottom: 5px;"
          @click="checkout"
          size="sm"
          block
          variant="warning"
        ) {{ $t('strings.generate_payment') }}
        b-button.mt-3(
          v-else
          style="margin-bottom: 5px;"
          block
          size="sm"
          variant="warning"
        )
          b-spinner(
            small
            variant="light"
            type="grow"
          )
    b-row
      b-col(md="6")
        b-form(@submit="")
          b-row.mt-5
            b-col
              b-form-group(
                id="input-group-name"
                :label="$t('strings.name')"
                label-for="name"
                :description="$t('strings.name')"
              )
                b-form-input(
                  id="name"
                  type="text"
                  :placeholder="$t('strings.name')"
                  required
                )
            b-col
              b-form-group(
                id="input-group-lastname"
                :label="$t('strings.lastname')"
                label-for="lastname"
                :description="$t('strings.lastname')"
              )
                b-form-input(
                  id="lastname"
                  type="text"
                  :placeholder="$t('strings.lastname')"
                  required
                )
            b-col
              b-form-group(
                id="input-group-second_lastname"
                :label="$t('strings.second_lastname')"
                label-for="second_lastname"
                :description="$t('strings.second_lastname')"
              )
                b-form-input(
                  id="second_lastname"
                  type="text"
                  :placeholder="$t('strings.second_lastname')"
                  required
                )
          b-row
            b-col.bg-primary(style="height:1px")
          b-row.mt-3
            b-col
              b-form-group(
                id="input-group-address"
                :label="$t('strings.address')"
                label-for="address"
                :description="$t('strings.address')"
              )
                b-form-input(
                  id="address"
                  type="text"
                  :placeholder="$t('strings.address')"
                  required
                )

      b-col(md="6")
        b-row.mt-5.cover(:style="{backgroundImage: 'url(http://via.placeholder.com/1920x500)'}" align-v="center" )
          b-col.border.shadow.logo( offset-md="1" :style="{backgroundImage: 'url(http://via.placeholder.com/500x500)'}")

</template>

<style scoped lang="scss">
.cover, .logo{
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  height: 150px;
}
.cover{
  padding: 20px;
}
.logo{
  max-width: 150px;
}
</style>
