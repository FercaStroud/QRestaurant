<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import {Action, namespace} from 'vuex-class';

import MenuList from './components/MenuList.vue';
import MenuModal from './components/MenuModal.vue';

const mStore = namespace('menus');

@Component({
  components: {MenuList,MenuModal}
})
export default class MyMenus extends Vue {
  @Action setBackUrl;
  @Action setMenu;
  @mStore.Action setModalVisible;
  @mStore.Action setForm;
  @mStore.Action setModalAdd;
  @mStore.State isModalVisible;
  @mStore.State isModalAdd;
  @mStore.State form;

  menu: Partial<Menu> = {};

  mounted() {
    this.setBackUrl('/dashboard');
    this.setMenu([
      {
        text: 'menus.add_menu',
        key: 1,
        handler: this.addMenu
      },
    ]);
  }

  addMenu(): void {
    this.setForm(this.menu);
    this.setModalAdd(true);
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
        h2 {{ $t('menus.title') }}
        MenuList

    menu-modal(
      ref='menus_modal',
      :form='form',
      :is-add='isModalAdd',
      :is-visible='isModalVisible',
    )
</template>


<style scoped>

</style>
