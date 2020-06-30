<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator';

@Component
export default class CategoriesCard extends Vue {
  @Prop() category: any;

  get actualUser() {
    return this.$auth.user();
  }
}
</script>

<template lang="pug">
b-col(sm="6" md="4" lg="3" )
  b-card.users-card.mb-3(no-body)

    div(slot='header')
      h4 {{ category.id }} - {{ category.name }}

    b-card-body
      img.img-fluid(v-if="category.image_src !== undefined" :src='category.image_src')

      p.card-text
        span.font-weight-bold {{ $t('strings.description') }}:
        | &nbsp;{{ category.description }}
        br/
        span.font-weight-bold {{ $t('categories.parent_name') }}:
        | &nbsp;{{ category.parent_id }}


    b-card-footer
      b-button(@click='$emit("edit-category")', variant='link')
        v-icon(name='pencil-alt')
        | &nbsp;{{ $t('buttons.edit') }}

      b-button.text-danger(
        @click='$emit("delete-category")',
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
