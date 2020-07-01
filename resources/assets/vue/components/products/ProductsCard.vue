<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator';
import {namespace} from 'vuex-class';

const cStore = namespace('categories');
@Component
export default class ProductsCard extends Vue {
  @Prop() product: any;

  @cStore.State categories;
  @cStore.Action loadCategories;

  async created() {
      await this.getCategories(1);
  }

  async getCategories(page: number): Promise<void> {
    this.loadCategories({ page });
  }

  get actualUser() {
    return this.$auth.user();
  }
}
</script>

<template lang="pug">
b-col(sm="6" md="4" lg="3" )
  b-card.users-card.mb-3(no-body)

    div(slot='header')
      h4 {{ product.id }} - {{ product.name }}

    b-card-body
      img.img-fluid(v-if="product.image_src" :src='"/uploads/images/products/" + product.image_src')

      p.card-text
        span.font-weight-bold {{ $t('strings.description') }}:
        | &nbsp;{{ product.description }}
        br/
        span.font-weight-bold(
          v-for='(category, i) in categories',
          :key='category.id',
          v-if="category.id === product.category_id"
        ) {{ $t('strings.category') }}:
          span.color-primary &nbsp; {{ category.name }}

        br/
        span.font-weight-bold {{ $t('strings.price') }}:
        | &nbsp;{{ product.price }}


    b-card-footer
      b-button(@click='$emit("edit-product")', variant='link')
        v-icon(name='pencil-alt')
        | &nbsp;{{ $t('buttons.edit') }}

      b-button.text-danger(
        @click='$emit("delete-product")',
        variant='link')
        v-icon(name='trash')
        | &nbsp;{{ $t('buttons.delete') }}
</template>

<style lang="scss" scoped>
  .card-header{
    height: 85px;
  }
.card-footer {
  display: flex;
  justify-content: flex-end;
  button {
    display: flex;
    align-items: center;
  }
}
</style>
