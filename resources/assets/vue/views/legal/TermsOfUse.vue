<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { Action } from 'vuex-class';

// TODO change
@Component
export default class Home extends Vue {
  @Action setBackUrl;
  @Action setMenu;
  @Action setDialogMessage;

  mounted() {
  }
}
</script>

<template lang="pug">
b-container(tag='main')
  h1 {{ $t('strings.terms_of_use') }}
  p El presente aviso de privacidad establece los términos en los que el sitio usa y protege la información que es proporcionada por sus usuarios al momento de utilizar su sitio web y redes sociales, conforme a lo dispuesto por la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados, y demás normatividad que resulte aplicable.
  p Este sitio está comprometido con la protección de sus datos personales, mediante su tratamiento legítimo, controlado e informado, a efecto de garantizar la privacidad, así como su derecho a la autodeterminación informativa.
  p Nuestro sitio web emplea la información, con el objetivo de proporcionar el mejor servicio posible, particularmente para mantener un registro de usuarios y poder compartir información. Es posible que sean enviados correos electrónicos de manera periódica a través de nuestro sitio web u otras tecnologías sobre información que consideremos relevante o pueda brindarle algún beneficio.
  p De conformidad con lo señalado, se entiende que está de acuerdo con el presente aviso de privacidad. Por lo anterior, y para prevenir el acceso no autorizado a sus datos, con el fin de asegurar que la información sea utilizada para los fines establecidos, se hace de su conocimiento que para poder ejercer sus derechos ARCO (Acceso, Rectificación, Cancelación u Oposición) al tratamiento de sus datos, deberá presentar una solicitud conforme a lo establecido en el artículo 29 de la Ley citada, incluyendo nombre, número telefónico, dirección y correo electrónico.
  p Su solicitud deberá ser enviada al correo:
    a(href="mailto:info@appsgorilasonline.com") info@appsgorilasonline.com
  p El sitio se reserva el derecho de cambiar, modificar, complementar y/o alterar los términos del presente aviso de privacidad en cualquier momento.

</template>

<style scoped lang="scss">
p{
  font-size: 1.2em;
  text-align: justify;
}
</style>
