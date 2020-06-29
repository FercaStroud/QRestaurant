<script lang="ts">
  import { Component, Vue, Watch } from 'vue-property-decorator';
  import { Action, State, namespace } from 'vuex-class';

  import dialog from '@/utils/dialog';

  import CategoriesCard from '@/components/categories/CategoriesCard.vue';
  import CategoriesModal from '@/components/categories/CategoriesModal.vue';

  const uStore = namespace('categories');

  @Component({
    components: {
      CategoriesCard,
      CategoriesModal,
    },
  })

  export default class Categories extends Vue {
    @Action setBackUrl;
    @Action setMenu;
    @uStore.State categories;
    @uStore.State pagination;
    @uStore.State isLoading;
    @uStore.State isModalVisible;
    @uStore.Action deleteCategory;
    @uStore.Action loadCategories;
    @uStore.Action setModalVisible;

    currentPage = 1;
    form: Partial<Category> = {};
    isModalAdd = true;

    async created() {
      this.setBackUrl('/');
      this.setMenu([
        {
          key: 'add_category',
          text: 'categories.add_category',
          handler: this.addCategory,
        },
      ]);

      this.currentPage = this.pagination.currentPage;

      if (this.categories.length == 0) {
        await this.getCategories(1);
      }
    }

    addCategory(): void {
      this.isModalAdd = true;
      this.setModalVisible(true);

      /*this.form = {
        type_id: 2,
      };*/
    }

    editCategory(category: Category, index: number): void {
      this.isModalAdd = false;
      this.setModalVisible(true);

      this.form = { ...category };
    }

    async deleteCategoryConfirm(category: Category): Promise<void> {
      if (!(await dialog('front.delete_category_confirmation', true))) {
        return;
      }

      this.deleteCategory(category);
    }

    async getCategories(page: number): Promise<void> {
      this.loadCategories({ page });
    }
  }
</script>

<template lang="pug">
  b-container(tag='main')
    b-pagination(
      align='center',
      v-if='pagination.totalCategories > pagination.perPage',
      v-model='currentPage',
      :per-page='pagination.perPage',
      :total-rows='pagination.totalCategories',
      @change='getCategories',
    )

    .categories(v-if='categories.length > 0')
      categories-card(
        v-for='category, i in categories',
        :key='category.id',
        :category='category',
        @edit-category='editCategory(category, i)',
        @delete-category='deleteCategoryConfirm(category)',
      )

    div(v-else-if='isLoading') {{ $t('strings.loading') }}...

    div(v-else) {{ $t('categories.no_categories') }}

    b-pagination(
      align='center',
      v-if='pagination.totalCategories > pagination.perPage',
      v-model='currentPage',
      :per-page='pagination.perPage',
      :total-rows='pagination.totalCategories',
      @change='getCategories',
    )

    categories-modal(
      ref='categories_modal',
      :form='form',
      :is-add='isModalAdd',
      :is-visible='isModalVisible',
    )
</template>
