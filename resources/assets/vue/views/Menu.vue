<script lang="ts">
  import {Component, Vue} from 'vue-property-decorator';
  import {Action, State, namespace} from 'vuex-class';

  const cStore = namespace('categories');

  @Component({
    components: {},
  })

  export default class Menu extends Vue {
    @cStore.State categoriesWithProducts;
    @cStore.Action loadCategoriesWithProducts;

    async created() {
        await this.getCategoriesWithProducts(this.$route.params.id);
    }

    async getCategoriesWithProducts(id: string): Promise<void> {
      this.loadCategoriesWithProducts({ id });
    }
  }
</script>

<template lang="pug">
div.bg-color
  div.fixed.custom-border-color
    b-container(fluid="")
      span.font-caveat(
        style={
          fontSize: '2em',
          color: '#f16338',
          float: 'left',
          padding: '10px'
        }
      ) {{ $t('strings.project_title') }}!
      //.font-caveat(
        style={
          fontSize: '2em',
          color: '#333',
          textAlign:'center',
          padding: '10px'
        }
      //) {{ categoriesWithProducts.user.name }}!

    //div.scrollmenu
      a Homeme
      a {{ $route.params.id }}
      a Homeme
  div.menu-header(
      :style="{backgroundImage: 'url(https://picsum.photos/1920/700)'}"
  )

  b-container#home(tag='main', fluid="")
    b-row
      b-col(md="12" v-for="data in categoriesWithProducts.categories" :key="n" )
        b-card(
          :title="data.name"
          img-top
          tag="article"
          style="width:100%"
          class="mb-2"
        )
          template(v-slot:header)
            img.img-fluid(v-if="data.image_src" :src='"/uploads/images/categories/" + data.image_src')

          b-card-text {{ data.description }}

          b-row
            b-col(md="3" v-for="product in data.products" :key="product.id" )
              b-card(
                img-top
                tag="article"
                style="width:100%"
              )
                template(v-slot:header)
                  img.img-fluid(v-if="product.image_src" :src='"/uploads/images/products/" + product.image_src')

                p.card-text
                  span.font-weight-bold {{ product.name }}
                  br/
                  | &nbsp;{{ product.price }}
                  br/
                  br/
                  | &nbsp;{{ product.description }}




//img.img-fluid(src="https://picsum.photos/500/500")


</template>

<style scoped>
  .menu-header{
    height: 400px;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
  }
  .card-header{
    padding: 0 !important;
  }
  .bg-color {
    background: #fff;
  }
  .fixed{
    position: fixed;
    width: 100%;
    z-index:99;
  }
  #home {
    padding-top: 150px;
  }
  div.scrollmenu {
    overflow: auto;
    white-space: nowrap;
    width: 100%;
  }

  div.scrollmenu a {
    display: inline-block;
    color: #333;
    text-align: center;
    padding: 14px;
    text-decoration: none;
  }

  div.scrollmenu a:hover {
    //background-color: #777;
    cursor:pointer;
    color:#f7f7f8 !important;
  }
</style>
