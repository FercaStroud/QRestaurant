<script lang="ts">
import {Component, Emit, Prop, Vue} from 'vue-property-decorator';
import {Action} from 'vuex-class';

import addCategoryMutation from '@/graphql/mutations/categories/addCategory.gql';
import editCategoryMutation from '@/graphql/mutations/categories/editCategory.gql';

import checkPassword from '@/utils/checkPassword';
import checkGraphQLError from '@/utils/checkGraphQLError';

@Component
export default class CategoriesModalGraphQL extends Vue {
  @Prop() form;
  @Prop() isAdd;
  @Prop() isVisible;
  @Action setDialogMessage;

  handleClose() {
    this.$emit('close-modal');
  }

  get activeMutation() {
    if (this.isAdd) {
      return addCategoryMutation;
    }

    return editCategoryMutation;
  }

  handleError({gqlError: {validation = null}}) {
    if (validation) {
      this.setDialogMessage(checkGraphQLError(validation));
    }
  }
}
</script>

<template lang="pug">
  ApolloMutation(
    :mutation='activeMutation',
    :variables='{ input: form }',
    @done='handleClose',
    @error='handleError',
  )
    template(slot-scope='{ mutate, loading, error }')
      b-modal(
        hide-header-close=true,
        :visible='isVisible',
        :cancel-title='$t("buttons.cancel")',
        :ok-disabled='loading',
        :ok-title='loading ? $t("buttons.sending") : isAdd ? $t("buttons.add") : $t("buttons.update")',
        :title='isAdd ? $t("categories.add_category") : $t("categories.edit_category")',
        @hidden='handleClose',
        @ok.prevent='mutate',
      )
        b-form
          b-form-group(
            :label='$t("strings.name")'
            label-for='name',
          )
            b-form-input#name(
              type='text',
              v-model='form.name',
              maxlength='191',
              required,
            )
          b-form-group(
            :label='$t("strings.description")'
            label-for='description',
          )
            b-form-textarea#description(
              type='text',
              v-model='form.description',
              maxlength='255',
              required,
            )

</template>
