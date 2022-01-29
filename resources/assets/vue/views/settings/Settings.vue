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
  @uStore.State userIsLoading;
  @uStore.Action updateUser;
  @uStore.Action updateLogo;
  @uStore.Action updateCover;
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
    await this.loadPaymentStatus();
  }

  async saveForm(event): Promise<void> {
    event.preventDefault();
    await this.updateUser(this.user);
  }

  async saveLogo(event) {
    event.preventDefault();
    await this.updateLogo(this.user.logo);
  }

  async saveCover(event) {
    event.preventDefault();
    await this.updateCover(this.user.cover);
  }

  async checkout(): Promise<void> {
    try {
      this.setLoading(true);
      const response = await axios.post('checkout');
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
  b-container.pt-5()
    .clearfix.pt-5
    .mp-container
    b-row
      b-col(md="3")
        h2 {{ $t('strings.personal_settings') }}
        strong {{ $t('strings.payment_status') }}:
        span.text-danger.font-weight-bolder(v-if="!paymentStatus") {{ $t('strings.payment_status_false') }}
        span.font-weight-bolder.text-success(v-else) {{ $t('strings.payment_status_true') }}
        p.font-weight-bolder.text-muted() {{ user.email }}

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
      b-col
        b-form(@submit="saveForm")
          b-row
            b-col
              b-form-group(
                id="input-group-name"
                :label="$t('strings.name')"
                label-for="name"
              )
                b-form-input(
                  id="name"
                  type="text"
                  v-model="user.name"
                  :placeholder="$t('strings.name')"
                  required
                  maxlength='25',
                )
            b-col
              b-form-group(
                id="input-group-lastname"
                :label="$t('strings.lastname')"
                label-for="lastname"
              )
                b-form-input(
                  id="lastname"
                  type="text"
                  v-model="user.lastname"
                  :placeholder="$t('strings.lastname')"
                  required
                  maxlength='15',
                )
            b-col
              b-form-group(
                id="input-group-second_lastname"
                :label="$t('strings.second_lastname')"
                label-for="second_lastname"
              )
                b-form-input(
                  id="second_lastname"
                  type="text"
                  maxlength='15',
                  v-model="user.second_lastname"
                  :placeholder="$t('strings.second_lastname')"
                )
            b-col
              b-form-group(
                id="input-group-phone"
                :label="$t('strings.phone')"
                label-for="phone"
              )
                b-form-input(
                  id="phone"
                  type="tel"
                  required
                  maxlength='20',
                  v-model="user.phone"
                  :placeholder="$t('strings.phone')"
                )
          b-row
            b-col
              h2 {{ $t('strings.settings') }}
          b-row.mt-3
            b-col
              b-form-group(
                id="input-group-restaurant_name"
                :label="$t('strings.restaurant_name')"
                label-for="restaurant_name"
              )
                b-form-input(
                  id="restaurant_name"
                  maxlength='50',
                  type="text"
                  v-model="user.restaurant_name"
                  :placeholder="$t('strings.restaurant_name')"
                )
          b-row.mt-3
            b-col
              b-form-group(
                id="input-group-address"
                :label="$t('strings.address')"
                label-for="address"
              )
                b-form-input(
                  id="address"
                  maxlength='400',
                  type="text"
                  v-model="user.address"
                  :placeholder="$t('strings.address')"
                )
          b-row
            b-col.bg-primary(style="height:1px")
          b-row.mt-3
            b-col
              b-form-group(
                id="input-group-state"
                :label="$t('strings.state')"
                label-for="state"
              )
                b-form-input(
                  id="state"
                  type="text"
                  v-model="user.state"
                  maxlength='75',
                  :placeholder="$t('strings.state')"
                )
            b-col
              b-form-group(
                id="input-group-municipality"
                :label="$t('strings.municipality')"
                label-for="municipality"
              )
                b-form-input(
                  id="municipality"
                  type="text"
                  maxlength='75',
                  v-model="user.municipality"
                  :placeholder="$t('strings.municipality')"
                )
          b-row
            b-col
              b-form-group(
                id="input-group-city"
                :label="$t('strings.city')"
                label-for="city"
              )
                b-form-input(
                  id="city"
                  type="text"
                  maxlength='75',
                  v-model="user.city"
                  :placeholder="$t('strings.city')"
                )
            b-col
              b-form-group(
                id="input-group-country"
                :label="$t('strings.country')"
                label-for="country"
              )
                b-form-input(
                  id="country"
                  type="text"
                  maxlength='75',
                  v-model="user.country"
                  :placeholder="$t('strings.country')"
                )
          b-row
            b-col()
              span {{$t("strings.description")}}
              quill-editor(
                ref="categoryQuillEditor"
                :options="{}"
                v-model="user.description"
              )
          b-row.mt-4
            b-col(md="3")
              b-button(v-if="!userIsLoading" block type="submit" variant="primary") {{ $t("buttons.update") }}
              b-button(
                v-else
                block
                variant="warning"
              )
                b-spinner(
                  small
                  variant="light"
                  type="grow"
                )

    b-row.mt-5.cover( :style="{backgroundImage: 'url(/uploads/images/headers/' + user.cover + ')'}" align-v="center" )
      b-col.border.shadow.logo(:style="{backgroundImage: 'url(/uploads/images/logos/' + user.logo + ')'}")

    b-row.mb-5
      b-col
        b-form(@submit="saveLogo")
          b-row
            b-col
              b-form-group(
                id="input-group-logo"
                :label="$t('strings.logo')"
                label-for="logo"
              )
                b-form-file(
                  id="logo"
                  accept="image/*",
                  :browse-text='$t("strings.browse")',
                  v-model="user.logo"
                  :state="Boolean(user.logo)"
                  :placeholder='$t("strings.choose_img")'
                  :drop-placeholder='$t("strings.drop_img")'
                )

          b-row.mt-1
            b-col(md="3")
              b-button(type="submit" variant="primary") {{ $t("buttons.update") }}
      b-col
        b-form(@submit="saveCover")
          b-row
            b-col
              b-form-group(
                id="input-group-cover"
                :label="$t('strings.cover')"
                label-for="cover"
              )
                b-form-file(
                  id="cover"
                  accept="image/*",
                  :browse-text='$t("strings.browse")',
                  v-model="user.cover"
                  :state="Boolean(user.cover)"
                  :placeholder='$t("strings.choose_img")'
                  :drop-placeholder='$t("strings.drop_img")'
                )

          b-row.mt-1
            b-col(md="3")
              b-button(type="submit" variant="primary") {{ $t("buttons.update") }}
</template>

<style scoped lang="scss">
.cover, .logo {
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
}

.cover {
  height: 350px;
}

.logo {
  max-width: 250px;
  height: 250px;
  margin-left: 20px;
}
</style>
