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
      this.loadCategoriesWithProducts({id});
    }
  }
</script>

<template lang="pug">
  div.bg-pattern
    div.fixed.bg-white
      b-container
        span.font-caveat(
          style={
            fontSize: '2em',
            color: '#f16338',
            float: 'left',
            padding: '10px'
          }
        ) {{ $t('strings.project_title') }}!

    div.menu-header(
      :style="{backgroundImage: 'url(/uploads/images/headers/'+categoriesWithProducts.user.image_src+')'}"
    )
      b-container
        b-card(
          style={
            position: 'absolute',
            marginTop: '120px'
          }
        )
          b-card-title {{ categoriesWithProducts.user.name }}!
          img.img-fluid(
            style={ maxWidth: '300px', padding:'20px' }
            v-if="categoriesWithProducts.user.logo_src"
            :src='"/uploads/images/logos/" + categoriesWithProducts.user.logo_src'
          )
          b-card-text
            strong Dirección
            br/
            p {{ categoriesWithProducts.user.address }}
            b-btn(
              target="_blank"
              :href="'https://www.google.com/maps/search/' + categoriesWithProducts.user.address"
            ) ¿Cómo llegar?


    b-container#home(tag='main')
      b-row
        b-col(md="12" v-for="(data, i) in categoriesWithProducts.categories" :key="i" )
          b-card(
            :title="data.name"
            tag="article"
            style="width:100%"
            class="mb-2"
          )
            b-card-text {{ data.description }}

            b-row
              b-col(md="3" v-for="product in data.products" :key="product.id" )
                b-card(
                  img-top
                  tag="article"
                  style="width:100%"
                )
                  template(v-slot:header)
                    img.img-fluid(
                      v-if="product.image_src"
                      :src='"/uploads/images/products/" + product.image_src'
                      style={}
                    )

                  p.card-text
                    span.font-weight-bold {{ product.name }}
                    br/
                    | &nbsp; $ {{ product.price }}
                    br/
                    br/
                    | {{ product.description }}

    b-container#footer(style={backgroundColor: '#393939', padding: '20px'}, fluid="" )
      a(
        target="_blank"
        href="https://www.appsgorilasonline.com/"
        style={color: 'white'}
      ) By Gorilas Online



</template>

<style scoped>
  .bg-pattern {
    background: url("https://www.toptal.com/designers/subtlepatterns/patterns/doodles.png");
  }

  .menu-header {
    height: 468px;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-position-y: 68px;
  }

  .card-header {
    padding: 0 !important;
  }

  .bg-color {
    background: #fff;
  }

  .fixed {
    position: fixed;
    width: 100%;
    z-index: 99;
  }

  #home {
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
    cursor: pointer;
    color: #f7f7f8 !important;
  }
</style>
