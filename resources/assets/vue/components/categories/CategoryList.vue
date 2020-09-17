<script lang="ts">
import { Component, Vue, } from 'vue-property-decorator';
import { Action, State, namespace } from 'vuex-class';

import dialog from '@/utils/dialog';
//import CategoryModal from '@/components/categories/CategoryModal.vue';

const cStore = namespace('categories');

@Component(
  {
    components: {
      //CategoryModal
      //ProductsCard,
      //ProductsModal,
    },
  }
)

export default class CategoryList extends Vue {
  @cStore.State fields;
  @cStore.State categories;
  @cStore.State isLoading;
  @cStore.State isModalAdd;
  @cStore.State form;
  @cStore.Action deleteCategory;
  @cStore.Action loadCategories;
  @cStore.Action setModalVisible;
  @cStore.Action setModalAdd;
  @cStore.Action setForm;

  //currentPage = 1;
  //category: Partial<Category> = {};

  async created() {
    await this.getCategories(parseInt(this.$route.params.id));
  }

  handleEditCategory(category: Category):void{
    this.setForm(category);
    this.setModalAdd(false);
    this.setModalVisible(true);
  }

  async deleteCategoryConfirm(category: Category): Promise<void> {
    if (!(await dialog('front.delete_category_confirmation', true))) {
      return;
    }

    this.deleteCategory(category);
  }

  async getCategories(menu_id: number): Promise<void> {
    this.loadCategories({ menu_id });
  }
}
</script>

<template lang="pug">
div
  b-table.btable(
    striped
    responsive
    hover
    sticky-header
    no-border-collapse
    head-variant="dark"
    :busy="isLoading"
    :items="categories"
    :fields="fields"
  )

    template(v-slot:table-busy)
      div.text-center.text-danger
        b-spinner.align-middle

    template(v-slot:head(name)="data")
      span {{$t("categories.name")}}
    template(v-slot:head(description)="data")
      span {{$t("categories.description")}}
    template(v-slot:head(image_src)="data")
      span {{$t("categories.image_src")}}
    template(v-slot:head(created_at)="data")
      span {{$t("strings.created_at")}}
    template(v-slot:head(updated_at)="data")
      span {{$t("strings.updated_at")}}
    template(v-slot:head(actions)="data")
      span {{$t("strings.actions")}}

    template(v-slot:cell(image_src)="data")
      img(
        v-if="data.item.image_src"
        :src='"/uploads/images/categories/" + data.item.image_src'
        style="width:108px;height:20px"
      )

    template(v-slot:cell(actions)="data")
      b-button.btn.table-btn.mb-2(
        size="sm"
        @click="handleEditCategory(data.item)"
        :title="$t('strings.edit')"
      )
        b-icon(
          icon="pencil"
          style="color: #fff;"
        )
      b-button.btn-danger.table-btn.mb-2(
        :title="$t('strings.delete')"
        @click="deleteCategoryConfirm(data.item)"
        size="sm"
      )
        b-icon(
          icon="trash-fill"
          style="color: #fff"
        )


    template( v-slot:cell(index)="data")
      span {{ data.index + 1 }}

</template>

<style scoped>

</style>
