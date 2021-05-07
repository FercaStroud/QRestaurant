<script lang="ts">
import {Component, Vue, Watch} from 'vue-property-decorator';
import {Action, State, namespace} from 'vuex-class';

import dialog from '@/utils/dialog';
import Menu from '@/views/Menu.vue';

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
  @mStore.Action addFileToMenu;

  currentPage = 1;
  menuQRData = {
    image: null,
    modal: false,
    data: {},
  };

  formFile = {
    image: null,
    id: null,
    modal:false,
  }

  mounted() {
    this.menuQRData.modal = false;
    this.getMenus();
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
  }

  downloadImage():void {
    let imagesrc;
    imagesrc = <HTMLElement>document.querySelector("#QR-CODE");

    const downloadImage = (name, content, type) => {
      let link = document.createElement('a');
      link.href = content;
      link.download = /\.\w+/.test(name) ? name : `${name}.${type}`;

      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    };
    downloadImage('QRCode', imagesrc.getAttribute("src"), 'png');

  }

  createQRImage(menu: Menu):void{
    this.menuQRData.modal = !this.menuQRData.modal;
    this.menuQRData.data = menu;
  }

  async deleteMenuConfirm(menu: Menu): Promise<void> {
    if (!(await dialog('front.delete_menu_confirmation', true))) {
      return;
    }

    this.deleteMenu(menu);
  }

  handleEditCategory(menu_id):void{
    this.$router.push({path: '/categories/' + menu_id});
  }

  handleAddFile(menu_id): void{
    this.formFile.id = menu_id;
    this.formFile.modal = true;
  }

  uploadFile(): void{
    this.addFileToMenu(this.formFile);
  }

  handleCloseModalFile(){
    this.formFile = {
      image: null,
      id: null,
      modal:false,
    }
  }
}
</script>

<template lang="pug">
  div
    b-table.btable(
      style="max-height:600px"
      sort-icon-left
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
      template(v-slot:head(type)="data")
        span {{$t("menus.type")}}
      template(v-slot:head(file)="data")
        span {{$t("menus.file")}}
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
          v-if="data.item.type !== 'PDF'"
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
          v-if="data.item.type !== 'PDF'"
          size="sm"
          @click="handleEditCategory(data.item.id)"
          :title="$t('categories.text')"
        )
          b-icon(
            icon="pencil"
            style="color: #fff;margin-right:5px"
          )
          span {{$t('strings.edit')}}

      template(v-slot:cell(file)="data")
        b-button.btn.table-btn.mb-2(
          v-if="data.item.type === 'PDF'"
          size="sm"
          @click="handleAddFile(data.item.id)"
          :title="$t('menus.add_file')"
        )
          b-icon(
            icon="cloud-upload"
            style="color: #fff;"
          )
        //b-button.btn.table-btn.mb-2(
        //  v-if="data.item.type === 'PDF'"
        //  size="sm"
        //  @click="handleViewFile(data.item.id)"
        //  :title="$t('menus.view_file')"
        //)
        //  b-icon(
        //    icon="search"
        //    style="color: #fff;"
        //  )
        //b-button.btn-danger.table-btn.mb-2(
        //  v-if="data.item.type === 'PDF'"
        //  :title="$t('strings.delete')"
        //  @click="deleteFileConfirm(data.item)"
        //  size="sm"
        //)
        //  b-icon(
        //    icon="trash-fill"
        //    style="color: #fff"
        //  )
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
          @click="createQRImage(data.item)"
          :title="$t('strings.download')"
        )
          b-icon(
            icon="cloud-download"
            style="color: #fff;"
          )
        b-button.btn-danger.table-btn.mb-2(
          :title="$t('strings.delete')"
          @click="deleteMenuConfirm(data.item)"
          size="sm"
        )
          b-icon(
            icon="trash-fill"
            style="color: #fff"
          )
      template( v-slot:cell(index)="data")
        span {{ data.index + 1 }}

    b-modal(
      :title="menuQRData.data.name"
      centered
      hide-footer
      v-model="menuQRData.modal"
    ) {{ $t('dashboard.your_code') }}:
      p {{'https://q-restaurant.com/menu/' + menuQRData.data.id}}
      qrcode.img-responsive(
        style="width:100%"
        id="QR-CODE"
        :value=" 'https://q-restaurant.com/menu/' + menuQRData.data.id",
        tag="img",
        :options="{ width: 1080,  color: { dark: '#000000', light: '#ffffff' }, }"
      )
      b-button.btn.table-btn.mb-2.bg-primary(
        style="width:100%"
        @click="downloadImage"
        :title="$t('strings.download')"
      )
        b-icon(
          icon="cloud-download"
          style="color: #fff;"
        )
        span &ensp; {{$t('strings.download')}}
    b-modal(
      :title="$t('menus.add_file')"
      centered
      v-model="formFile.modal"
      @ok.prevent='uploadFile'
      hide-header-close=true
      :ok-disabled='isLoading',
      :cancel-title='$t("buttons.cancel")',
      :ok-title='isLoading ? $t("buttons.sending") : $t("buttons.add")',
      @hide='handleCloseModalFile'
    )
      b-form
        b-form-group(
          :label='$t("menus.file")'
          label-for='file',
        )
          b-form-file#file(
            type='text',
            accept="pdf/*",
            :browse-text='$t("strings.browse")',
            :state="Boolean(formFile.file)"
            v-model='formFile.file',
            maxlength='191',
            :placeholder='$t("strings.choose_file")'
            :drop-placeholder='$t("strings.drop_file")'
          )

</template>


<style scoped>
.btable {
  margin-top: 30px;
}
</style>
