<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import {Action, State, namespace} from 'vuex-class';
import VuePdfApp from 'vue-pdf-app';
import 'vue-pdf-app/dist/icons/main.css';

const cStore = namespace('categories');

@Component({
  components: {VuePdfApp},
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
    div.menu-header(
      :style="{backgroundImage: 'url(https://picsum.photos/1080/500/?blur)'}"
    )
      b-container
        b-card.square-logo-container(
          style={
            position: 'absolute',
            marginTop: '100px',
          }
        )
          div.square-logo(
            v-if="categoriesWithProducts.user.logo_src"
            :style="{backgroundImage: 'url(/uploads/images/logos/'+categoriesWithProducts.user.logo_src+')'}"
          )


    b-container#home(tag='main')
      b-row(v-if="categoriesWithProducts.settings.type === 'PDF'")
        b-col
          vue-pdf-app(
            style="height: 100vh"
            :pdf='"/uploads/menus/pdfs/" + categoriesWithProducts.settings.file'
          )
      b-col(md="12" v-for="(data, i) in categoriesWithProducts.categories" :key="i" )
        b-card(
          :title="data.name"
          tag="article"
          style="width:100%"
          class="mb-2"
          border-variant="none"
          :style="{ backgroundColor: 'rgba(255,255,255,.6)', border:'none'}"
        )
          template(v-slot:header)
            img.img-fluid(v-if="data.image_src" :src='"/uploads/images/categories/" + data.image_src')

          b-card-text {{ data.description }}

          b-row(
            v-if="categoriesWithProducts.settings.type === 'NORMAL'"
          )
            b-col(md="4" v-for="product in data.products" :key="product.id" )
              b-card(
                style="width:100%"
              )
                b-card-body
                  div.card-preview(
                    v-if="product.image_src"
                    :style="{marginBottom: '18px',backgroundImage: 'url(/uploads/images/products/' + product.image_src + ')'}"
                  )

                  p.card-text
                    span.font-weight-bold {{ product.name }}
                    br/
                    | &nbsp; $ {{ product.price }}
                    br/
                    br/
                    | {{ product.description }}


          b-row(
            v-if="categoriesWithProducts.settings.type === 'TEXT'"
          )
            b-col(md="4" v-for="product in data.products" :key="product.id" )
              span.font-weight-bold {{ product.name }}
              br/
              span(style="color:#f7931e; font-family: monospace; font-size:1.5em;") $ {{ product.price }}
              br/
              span(style="font-size:.9em; color:#3f3f3f; font-family: monospace;") {{ product.description }}
              br/
              br/


    b-container#footer(style={backgroundColor: '#393939', padding: '20px', marginTop: '50px'}, fluid="" )
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

.square-logo {
  height: 300px;
  width: 300px;
  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
}

@media (max-width: 372px) {
  .square-logo-container {
    left: 0px;
    border-radius: 0px;
    width: 100%;
  }
}

@media (max-width: 300px) {
  .square-logo {
    height: 250px;
    width: 250px;
  }
}
</style>
