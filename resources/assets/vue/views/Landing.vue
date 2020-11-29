<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import {Action, State} from 'vuex-class';
import Parallax from 'vue-parallaxy';

@Component(
  {
    components: {Parallax},
  }
)

export default class Landing extends Vue {
  @Action setBackUrl;
  @Action setMenu;

}
</script>

<template lang="pug">
  div
    .parallax(
      style="minHeight: 600px;backgroundImage:url('/images/Isometric.svg');backgroundPosition: center;backgroundSize: cover;"
    )
      #message.color-secondary
        div(
          style="padding:2%;border-radius:25px;"
        )
          p(
            style="text-shadow:0px 1px 30px black; line-height: 34px;"
          )
            span.Gotham-Black(style="color:white") TU MENÚ &ensp;
            span.Gotham-Black.color-primary DIGITAL.
          p Deja de gastar en menús impresos.
          p Descubre una nueva forma de presentar los platillos de tu restaurant con un menú digital.

          b-button.btn-primary(style={width: '180px', marginBottom: '30px'})(
            to='/registrations/new',
          ) {{ $t('buttons.register') }}

    section#aboutUs
      b-container
        b-row
          b-col(md="12")
            br
            p(
              style=" text-align:center;"
            )
              span.Gotham-Black.color-secondary TAN FÁCIL COMO
          b-col(md="12")
            img(
              style="width:100%"
              src='/images/qr-concept.jpg',
              alt='Logo QRestaurant'
            )
          b-col(md="12")
            p.color-secondary(style="text-align:center") Diseñamos y digitalizamos el menú de tu restaurant, cafetería, o bar, ofrecemos a tus clientes una alternativa cómoda y segura para ordenar sus platillos favoritos a través de un Código QR.

      .parallax(
        style="minHeight: 300px;backgroundImage:url('/images/Kitchen.jpg');backgroundPosition: center;backgroundSize: cover;"
      )
        b-row
          b-col(sm="12" md="12" style="text-align:center")
            br
            p.Gotham-Black#whatIs() ¡Actualiza tu restaurant!
            img.branding-logo(
              style="width:200px"
              src='/images/qr2.svg',
              alt='Logo QRestaurant'
            )

      b-container
        b-row
          b-col(md="12")
            br
            p(
              style=" text-align:center;"
            )
              span.Gotham-Black.color-secondary PAQUETE ANUAL

          b-col(md="12")
            p(style="text-align:center")
              span ¡PRIMER MES GRATIS!
              br
              span Nombre del restaurante y logotipo
              br
              span De 2 a 5 menús
              br
              span Categorías ilimitadas
              br
              span Bebidas y platillos ilimitados
              br
              span Fotos de tus platillos y bebidas
              br
              span Actualizaciones y soporte
              br

              b-button.btn-primary(style={width: '400px', marginBottom: '30px'})(
                to='/registrations/new',
              ) {{ $t('buttons.register') }}

      .parallax(
            style="minHeight: 130px;backgroundImage:url('/images/delivery.svg');backgroundPosition: center;backgroundSize: cover;"
          )
            b-row
              b-col(sm="12" md="12" style="text-align:center")
                br
                p.Gotham-Black#whatIs() Dile adiós a los menús tradicionales...



    //section.container#steps
      b-row
        b-col(sm="12" md="12" style="text-align:center;")
          h1.color-secondary ¿Qué es Q-Restaurant?
          p.color-secondary Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, aliquid cum deleniti iste necessitatibus quaerat? Beatae debitis et ipsa, natus necessitatibus, non porro, qui quibusdam quo rem sapiente similique ullam!
        b-col(sm="12" md="12" style="text-align:center;")
          .color-secondary(style="font-size:35px") Paso 1
          b-icon(
            style="font-size:35px"
            icon="arrow-down"
          )
        b-col(sm="12" md="12" style="text-align:center;")
          p.color-secondary Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, aliquid cum deleniti iste necessitatibus quaerat? Beatae debitis et ipsa, natus necessitatibus, non porro, qui quibusdam quo rem sapiente similique ullam!
          img(
              style="width:100%"
              src='https://picsum.photos/700/200',
              alt='QRestaurant'
            )
        b-col(sm="12" md="12" style="text-align:center;")
          .color-secondary(style="font-size:35px") Paso 2
          b-icon(
            style="font-size:35px"
            icon="arrow-down"
          )
        b-col(sm="12" md="12" style="text-align:center;")
          p.color-secondary Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, aliquid cum deleniti iste necessitatibus quaerat? Beatae debitis et ipsa, natus necessitatibus, non porro, qui quibusdam quo rem sapiente similique ullam!
          img(
              style="width:100%"
              src='https://picsum.photos/700/200',
              alt='QRestaurant'
            )


    //section.container#accordion(role='tablist')
      b-row
        b-col(sm="12" md="12" style="text-align:center;")
          h1.color-secondary Preguntas Frecuentes
          p.color-secondary Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, aliquid cum deleniti iste necessitatibus quaerat? Beatae debitis et ipsa, natus necessitatibus, non porro, qui quibusdam quo rem sapiente similique ullam!

      b-card.mb-1(no-body='')
        b-card-header.p-1(header-tag='header' role='tab')
          b-button(block='' v-b-toggle.accordion-1='') Pregunta 1
        b-collapse#accordion-1(visible='' accordion='my-accordion' role='tabpanel')
          b-card-body
            b-card-text
              | I start opened because
              code visible
              |  is
              code true
            b-card-text Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi est, totam! Aperiam debitis dolor dolorem, dolorum enim, error excepturi harum iste labore maxime nesciunt, porro praesentium repellendus sit tempore velit.
      b-card.mb-1(no-body='')
        b-card-header.p-1(header-tag='header' role='tab')
          b-button(block='' v-b-toggle.accordion-2='') Pregunta 2
        b-collapse#accordion-2(accordion='my-accordion' role='tabpanel')
          b-card-body
            b-card-text Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi est, totam! Aperiam debitis dolor dolorem, dolorum enim, error excepturi harum iste labore maxime nesciunt, porro praesentium repellendus sit tempore velit.

      b-card.mb-1(no-body='')
        b-card-header.p-1(header-tag='header' role='tab')
          b-button(block='' v-b-toggle.accordion-3='') Pregunta 3
        b-collapse#accordion-3(accordion='my-accordion' role='tabpanel')
          b-card-body
            b-card-text Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi est, totam! Aperiam debitis dolor dolorem, dolorum enim, error excepturi harum iste labore maxime nesciunt, porro praesentium repellendus sit tempore velit.


</template>

<style lang="scss">
$primary_color: #ff6a00;

.header {
  img {
    width: 100%;
  }
}

section {
  //margin-top: 100px;
}

/* First Section Styles */
#message {
  position: absolute;
  width: 400px;

  span {
    font-size: 5em;
  }

  margin: 15% 10% 10% 10%;
}

#whatIs {
  font-size: 3em;
  text-shadow: 1px 1px 30px black;
  color: white;
}

@media (max-width: 1280px) {
  #message {
    //margin: 20% 10% 10% 10%;
  }
}

@media (max-width: 991px) {
  #message {
    span {
      font-size: 3em;
    }

    margin: 20% 10% 10% 10%;
    width: 80%;
  }
}

@media (max-width: 500px) {
  #message {
    span {
      font-size: 15vw;
    }

    margin: 50% 10% 10% 10%;
    width: 80%;
  }
}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1024px) {
  .parallax {
    background-attachment: scroll;
  }
}
</style>
