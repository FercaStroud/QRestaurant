<script lang="ts">
import {Component, Vue, Watch} from 'vue-property-decorator';
import {Action, State, namespace} from 'vuex-class';

import dialog from '@/utils/dialog';

const mStore = namespace('menus');

@Component
export default class MenuList extends Vue {
  @mStore.State fields;
  @mStore.State menus;
  @mStore.State isLoading;
  @mStore.State isModalAdd;
  @mStore.State form;
  @mStore.Action deleteMenu;
  @mStore.Action loadMenus;
  @mStore.Action setModalVisible;
  @mStore.Action setModalAdd;
  @mStore.Action setForm;

  currentPage = 1;

  async created() {
      await this.getMenus();
  }

  async getMenus(): Promise<void> {
    this.loadMenus();
  }

  handleEditMenu(menu: Menu):void{
    this.setForm(menu);
    this.setModalAdd(false);
    this.setModalVisible(true);
  }

  handleEditProduct(menu_id):void{
    this.$router.push({path: '/products/' + menu_id});
    //console.log(payload)
  }

  handleEditCategory(menu_id):void{
    this.$router.push({path: '/categories/' + menu_id});
    //console.log(payload)
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
      :items="menus"
      :fields="fields"
    )

      template(v-slot:table-busy)
        div.text-center.text-danger
          b-spinner.align-middle

      template(v-slot:head(name)="data")
        span {{$t("menus.name")}}
      template(v-slot:head(description)="data")
        span {{$t("menus.description")}}
      template(v-slot:head(products)="data")
        span {{$t("products.text")}}
      template(v-slot:head(categories)="data")
        span {{$t("categories.text")}}
      template(v-slot:head(created_at)="data")
        span {{$t("strings.created_at")}}
      template(v-slot:head(updated_at)="data")
        span {{$t("strings.updated_at")}}
      template(v-slot:head(settings)="data")
        span {{$t("strings.settings")}}
      template(v-slot:head(actions)="data")
        span {{$t("strings.actions")}}

      template(v-slot:cell(products)="data")
        b-button.btn.table-btn.mb-2(
          @click="handleEditProduct(data.item.id)"
          size="sm"
          :title="$t('products.text')"
        )
          b-icon(
            icon="pencil"
            style="color: #fff;margin-right:5px"
          )
          span {{$t('strings.edit')}}

      template(v-slot:cell(categories)="data")
        b-button.btn.table-btn.mb-2(
          size="sm"
          @click="handleEditCategory(data.item.id)"
          :title="$t('categories.text')"
        )
          b-icon(
            icon="pencil"
            style="color: #fff;margin-right:5px"
          )
          span {{$t('strings.edit')}}

      template(v-slot:cell(settings)="data")
        b-button.btn.table-btn.mb-2(
          size="sm"
          :title="$t('strings.settings')"
        )
          b-icon(
            icon="gear-fill"
            style="color: #fff;margin-right:5px"
          )
          span {{$t('strings.settings')}}

      template(v-slot:cell(actions)="data")
        b-button.btn.table-btn.mb-2(
          size="sm"
          @click="handleEditMenu(data.item)"
          :title="$t('strings.edit')"
        )
          b-icon(
            icon="pencil"
            style="color: #fff;"
          )
        b-button.btn.table-btn.mb-2(
          size="sm"
          :title="$t('strings.download')"
        )
          b-icon(
            icon="cloud-download"
            style="color: #fff;"
          )
        b-button.btn-danger.table-btn.mb-2(
          :title="$t('strings.delete')"
          size="sm"
        )
          b-icon(
            icon="trash-fill"
            style="color: #fff"
          )
        //b-button(
          variant=""
          @click="data.toggleDetails"
        //)  {{ data.detailsShowing ? 'Cerrar' : 'Mostrar' }}


      template( v-slot:cell(index)="data")
        span {{ data.index + 1 }}

</template>


<style scoped>
.btable {
  margin-top: 30px;
}
</style>
