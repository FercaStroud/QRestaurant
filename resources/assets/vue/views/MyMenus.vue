<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import {Action, namespace} from 'vuex-class';

import MenuList from '../components/menus/MenuList.vue';
import MenuModal from '../components/menus/MenuModal.vue';

const mStore = namespace('menus');

@Component({
  components: {MenuList,MenuModal}
})
export default class MyMenus extends Vue {
  @Action setMenu;
  @mStore.Action setModalVisible;
  @mStore.State isModalVisible;

  form: Partial<Menu> = {};
  isModalAdd = true;

  mounted() {
    this.setMenu([
      {
        text: 'menus.add_menu',
        key: 1,
        handler: this.addMenu
      },
    ]);
  }

  addMenu(): void {
    this.isModalAdd = true;
    this.form.name = '';
    this.form.description = '';
    this.setModalVisible(true);
  }
}
</script>

<template lang="pug">
  b-container(fluid="")
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
