<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import {Action, namespace} from 'vuex-class';

import CategoryList from './components/CategoryList.vue';
import CategoryModal from './components/CategoryModal.vue';

const cStore = namespace('categories');

@Component({
  components: {CategoryList, CategoryModal}
})
export default class Categories extends Vue {
  @Action setBackUrl;
  @Action setMenu;
  @cStore.Action setModalVisible;
  @cStore.Action setForm;
  @cStore.Action setModalAdd;
  @cStore.State isModalVisible;
  @cStore.State isModalAdd;
  @cStore.State form;

  category: Partial<Category> = {};

  mounted() {
    this.setBackUrl('/dashboard');
    this.setMenu([
      {
        text: 'categories.add_category',
        key: 1,
        handler: this.addCategory
      },
    ]);
  }

  addCategory(): void {
    this.setForm(this.category);
    this.setModalAdd(true);
    this.form.menu_id = parseInt(this.$route.params.id);
    this.form.name = '';
    this.form.description = '';
    this.setModalVisible(true);
  }
}
</script>

<template lang="pug">
  b-container.pt-5(fluid="")
    .clearfix.pt-5
    b-row
      b-col
        h2 {{ $t('categories.title') }}
        CategoryList

    category-modal(
      ref='categories_modal',
      :form='form',
      :is-add='isModalAdd',
      :is-visible='isModalVisible',
    )

</template>


<style scoped>

</style>
