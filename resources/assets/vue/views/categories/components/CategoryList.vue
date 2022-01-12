<script lang="ts">
import {Component, Vue,} from 'vue-property-decorator';
import {Action, State, namespace} from 'vuex-class';

import dialog from '@/utils/dialog';
import AddFileModal from './AddFileModal.vue';

const cStore = namespace('categories');

@Component(
  {
    components: {
      AddFileModal
    },
  }
)

export default class CategoryList extends Vue {
  @cStore.State fields;
  @cStore.State categories;
  @cStore.State isLoading;
  @cStore.State isModalAdd;
  @cStore.State form;
  @cStore.State isAddFileModalVisible;
  @cStore.Action deleteCategory;
  @cStore.Action setAddFileModalVisible;
  @cStore.Action loadCategories;
  @cStore.Action setModalVisible;
  @cStore.Action setModalAdd;
  @cStore.Action setForm;

  search = '';

  mounted() {
    this.$nextTick(() => {
      this.getCategories(parseInt(this.$route.params.id));
    });
  }

  handleEditCategory(category: Category): void {
    this.setForm(category);
    this.setModalAdd(false);
    this.setModalVisible(true);
  }

  handleAddFile(category: Category): void {
    this.setForm(category);
    this.setAddFileModalVisible(true);
  }

  async deleteCategoryConfirm(category: Category): Promise<void> {
    if (!(await dialog('front.delete_category_confirmation', true))) {
      return;
    }

    this.deleteCategory(category);
  }

  async getCategories(menu_id: number): Promise<void> {
    this.loadCategories({menu_id});
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
      @click="getCategories(parseInt($route.params.id))"
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
      :items="categories"
      :fields="fields"
      select-mode="single"
      small
      :filter="search"
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

      template(v-slot:cell(description)="data")
        b-button.btn-block.text-size-small(
          size="sm"
          variant="warning"
          @click="data.toggleDetails"
          :title="(data.detailsShowing ? $t('strings.hide') : $t('strings.show'))+' '+$t('strings.details')"
        )
          span {{ data.detailsShowing ? $t('strings.hide') : $t('strings.show') }} {{ $t('strings.details') }}

      template(v-slot:cell(image_src)="data")
        b-button.text-size-small(
          v-if="data.item.image_src"
          :href='"/uploads/images/categories/" + data.item.image_src'
          target="_blank"
          size="sm"
          variant="warning"
        ) {{ $t('strings.show') }}

      template(v-slot:cell(created_at)="data")
        span {{ data.item.created_at | moment("D, MMMM YYYY") }}
      template(v-slot:cell(updated_at)="data")
        span {{ data.item.updated_at | moment("D, MMMM YYYY") }}

      template(v-slot:cell(actions)="data")
        b-button.btn.table-btn.mb-2.text-size-small(
          size="sm"
          variant="warning"
          @click="handleAddFile(data.item)"
          :title="$t('strings.add_image')"
        )
          b-icon(
            icon="cloud-upload"
            style="color: #000"
          )
        b-button.btn.table-btn.mb-2.text-size-small(
          size="sm"
          @click="handleEditCategory(data.item)"
          :title="$t('strings.edit')"
        )
          b-icon(
            icon="pencil"
            style="color: #fff;"
          )
        b-button.btn-danger.table-btn.mb-2.text-size-small(
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

      template(#row-details='data')
        b-container(fluid)
          b-row
            b-col
              b-card.shadow.p-3(v-html="data.item.description")

    add-file-modal(
      ref='add-file-category_modal',
      :form='form',
      :is-visible='isAddFileModalVisible',
    )
</template>

<style scoped>

</style>
