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
      style="minHeight: 600px;backgroundImage:url('/images/delivery.svg');backgroundPosition: center;backgroundSize: cover;"
    )
      #message.color-secondary
        .glass(
          style="padding:2%;border-radius:25px;"
        )
          br
          p(
            style="text-shadow:0px 1px 10px white; line-height: 34px;"
          )
            span TU MENÚ &ensp;
            span.color-primary DIGITAL.
          p Descubre una nueva forma de presentar los platillos de tu restaurant con un menú digital.
          p Una alternativa
            strong rápida, segura y moderna.

          b-button.btn-primary(style={width: '180px', marginBottom:'30px'})(
            to='/registrations/new',
          ) {{ $t('buttons.register') }}

    section.container#aboutUs
      b-row
        b-col(sm="12" md="6")
          h1.color-secondary ¿Qué es Q-Restaurant?
          p.color-secondary Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequuntur eos eum, expedita fugiat fugit, id itaque minima nemo neque placeat quae quam quas reiciendis rem sed voluptatum! Ab, doloribus.

          img(
            style="width:100%"
            src='/images/qr1.svg',
            alt='QRestaurant'
          )

          h1.color-secondary Fácil y Simple
          p.color-secondary Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequuntur eos eum, expedita fugiat fugit, id itaque minima nemo neque placeat quae quam quas reiciendis rem sed voluptatum! Ab, doloribus.

        b-col(sm="12" md="6")
          img(
            style="width:100%"
            src='/images/menu_example.jpg',
            alt='QRestaurant'
          )
    section.container#steps
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


    section.container#accordion(role='tablist')
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
section{
  margin-top: 100px;
}
/* First Section Styles */
#message {
  position: absolute;
  width: 400px;
  span {
    font-size: 3em;
  }

  margin: 15% 10% 10% 10%;
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
