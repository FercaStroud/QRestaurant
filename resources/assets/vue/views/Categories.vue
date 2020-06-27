<script lang="ts">
import {Component, Vue, Watch} from 'vue-property-decorator';
import {Action} from 'vuex-class';

import dialog from '@/utils/dialog';

import CategoriesCard from '@/components/categories/CategoriesCard.vue';
import CategoriesModalGraphQL from '@/components/categories/CategoriesModalGraphQL.vue';
import deleteCategoryMutation from '@/graphql/mutations/categories/deleteCategory.gql';

@Component({
  components: {
    CategoriesCard,
    'category-modal': CategoriesModalGraphQL,
  },
})
export default class Categories extends Vue {
  @Action setBackUrl;
  @Action setMenu;
  @Action setDialogMessage;
  isModalVisible = false;
  isModalAdd = true;

  perPage = 10;
  currentPage = 1;
  form: Partial<Category> = {};

  searchText = '';
  actualName = '';

  search: string | null = null;

  perPageOptions = [
    { value: 5, text: '5' },
    { value: 10, text: '10' },
    { value: 15, text: '15' },
    { value: 20, text: '20' },
  ];

  async created() {
    this.setBackUrl('/');
    this.setMenu([
      {
        key: 'add_category',
        text: 'categories.add_category',
        handler: this.addCategory,
      },
    ]);

    this.loadRoute(null);

    this.$router.afterEach((to, from) => {
      this.loadRoute(null);
    });
  }

  addCategory(): void {
    this.isModalVisible = true;
    this.isModalAdd = true;

    this.form = {
      //type_id: 2,
    };
  }

  editCategory(category: Category): void {
    this.isModalVisible = true;
    this.isModalAdd = false;

    this.form = {...category};
  }

  loadRoute(e) {
    const id = this.$route.params.id;
    const { page, limit, search } = this.$route.query;

    this.currentPage = Number(page) || 1;
    this.perPage = Number(limit) || 10;
    this.search = <string>search || null;
    this.searchText = <string>search || '';

    if (search) {
      this.setBackUrl('/categories');
    } else {
      this.setBackUrl('/');
    }
  }

  changePage(e) {
    this.$router.push({
      query: {
        ...this.$route.query,
        page: e,
      },
    });
  }

  doSearch() {
    this.$router.push({
      query: {
        ...this.$route.query,
        search: this.searchText,
      },
    });
  }

  @Watch('perPage')
  onPerPageChange(newVal) {
    this.$router.push({
      query: {
          ...this.$route.query,
          limit: newVal,
        },
      });
    }

    closeModal(query) {
      if (this.isModalAdd) {
        query.refetch();
      }

      this.isModalVisible = false;

      this.form = {};
    }

    getPaginationTo(to, total) {
      if (to < total) {
        return to;
      }

      return total;
    }

    async deleteCategoryConfirm({ id }: Category, query): Promise<void> {
      if (!(await dialog('front.delete_category_confirmation', true))) {
        return;
      }

      const result = await this.$apollo.mutate({
        mutation: deleteCategoryMutation, variables: {id,},
      });

      if (result.data.deleteCategory.status) {
        query.refetch();
      }
    }
  }
</script>

<template lang="pug">
  b-container(tag='main')
    ApolloQuery(
      :query="require('@/graphql/queries/fetchCategories.gql')",
      :variables='{ limit: perPage, page: currentPage, search }'
    )
      template(slot-scope='{ result: { loading, error, data }, query }')
        // Loading
        .loading.apollo(v-if='loading') {{ $t('strings.loading') }}...
        // Error
        .error.apollo(v-else-if='error') {{ $t('strings.error_occurred') }}
        // Result
        .result.apollo(v-else-if='data')
          .row
            .offset-lg-8
            form.input-group.mb-3.col-lg-4(@submit.prevent='doSearch')
              b-form-input(type='text', v-model='searchText', :placeholder="$t('categories.search')")
              .input-group-append
                b-button(type='submit', variant='outline-secondary') {{ $t('strings.search') }}

          | {{ $t('strings.items_to_show') }}

          b-form-select.mb-3(v-model="perPage", :options="perPageOptions")

          b-pagination(
            align='center',
            v-if='data.categories.total > data.categories.per_page',
            v-model='currentPage',
            :per-page='data.categories.per_page',
            :total-rows='data.categories.total',
            @change='changePage',
          )

          .text-center.mb-3 {{ $t('strings.showing_results', { from: ((currentPage - 1) * perPage) + 1, to: getPaginationTo(currentPage * perPage, data.categories.total), total: data.categories.total }) }}

          .categories
            categories-card(
              v-for='category in data.categories.data',
              :key='category.id',
              :category='category',
              @edit-category='editCategory(category)',
              @delete-category='deleteCategoryConfirm(category, query)',
            )

          .text-center.mb-3 {{ $t('strings.showing_results', { from: ((currentPage - 1) * perPage) + 1, to: getPaginationTo(currentPage * perPage, data.categories.total), total: data.categories.total }) }}

          b-pagination(
            align='center',
            v-if='data.category.total > data.category.per_page',
            v-model='currentPage',
            :per-page='data.category.per_page',
            :total-rows='data.category.total',
            @change='changePage',
          )

          categories-modal(
            ref='categories_modal',
            :form='form',
            :is-add='isModalAdd',
            :is-visible='isModalVisible',,
            @close-modal='closeModal(query)'
          )
</template>

