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
b-container(tag='main' style="height:100vh;overflow:auto")
  h1 {{ $t('strings.privacy_policy') }}
  p El presente contrato describe los términos y condiciones aplicables al uso del contenido, productos y/o servicios del sitio web (nombre del sitio web) del cual es titular (nombre del titular del sitio web). Para hacer uso del contenido, productos y/o servicios del sitio web el usuario deberá sujetarse a los presentes términos y condiciones.
  strong I -  Objeto
  p El objeto es regular el acceso y utilización del contenido, productos y/o servicios a disposición del público en general en el dominio q-restaurant.com
  p El titular se reserva el derecho de realizar cualquier tipo de modificación en el sitio web en cualquier momento y sin previo aviso, el usuario acepta dichas modificaciones.
  p El acceso al sitio web por parte del usuario es libre y gratuito, la utilización del contenido, productos y/o servicios implica un costo de suscripción para el usuario.
  p El sitio web solo admite el acceso a personas mayores de edad y no se hace responsable por el incumplimiento de esto.
  p El sitio web está dirigido a usuarios residentes en México y cumple con la legislación establecida en dicho país, si el usuario reside en otro país y decide acceder al sitio web lo hará bajo su responsabilidad.
  p La administración del sitio web puede ejercerse por terceros, es decir, personas distintas al titular, sin afectar esto los presentes términos y condiciones.
  strong II -  Usuario
  p La actividad del usuario en el sitio web como publicaciones o comentarios estarán sujetos a los presentes términos y condiciones. El usuario se compromete a utilizar el contenido, productos y/o servicios de forma lícita, sin faltar a la moral o al orden público, absteniéndose de realizar cualquier acto que afecte los derechos de terceros o el funcionamiento del sitio web.
  p El usuario se compromete a proporcionar información verídica en los formularios del sitio web.
  p El acceso al sitio web no supone una relación entre el usuario y el titular del sitio web.
  p El usuario manifiesta ser mayor de edad y contar con la capacidad jurídica de acatar los presentes términos y condiciones.
  strong III -  Acceso y Navegación en el Sitio Web
  p El titular no garantiza la continuidad y disponibilidad del contenido, productos y/o servicios en el sitito web, realizará acciones que fomenten el buen funcionamiento de dicho sitio web sin responsabilidad alguna.
  p El titular no se responsabiliza de que el software esté libre de errores que puedan causar un daño al software y/o hardware del equipo del cual el usuario accede al sitio web. De igual forma, no se responsabiliza por los daños causados por el acceso y/o utilización del sitio web.
  strong IV -	POLÍTICA DE PRIVACIDAD Y PROTECCIÓN DE DATOS
  p Conforme a lo establecido en la Ley Federal de Protección de Datos Personales en Posesión de Particulares, el titular se compromete a tomar las medidas necesarias que garanticen la seguridad del usuario, evitando que se haga uso indebido de los datos personales que el usuario proporcione en el sitio web.
  p El titular corroborará que los datos personales contenidos en las bases de datos sean correctos, verídicos y actuales, así como que se utilicen únicamente con el fin con el que fueron recabados.
  p El uso de datos personales se limitará a lo previsto en el Aviso de Privacidad disponible en /privacy-policy
  p Q-Restaurant se reserva el derecho de realizar cualquier tipo de modificación en el Aviso de Privacidad en cualquier momento y sin previo aviso, de acuerdo con sus necesidades o cambios en la legislación aplicable, el usuario acepta dichas modificaciones.
  p El sitio web implica la utilización de cookies que son pequeñas cantidades de información que se almacenan en el navegador utilizado por el usuario como datos de ingreso, preferencias del usuario, fecha y hora en que se accede al sitio web, sitios visitados y dirección IP, esta información es anónima y solo se utilizará para mejorar el sitio web.
  p Las cookies facilitan la navegación y la hacen más amigable, sin embargo, el usuario puede desactivarlos en cualquier momento desde su navegador en el entendido de que esto puede afectar algunas funciones del sitio web.
  strong V - POLÍTICA DE ENLACES
  p En el sitio web puede contener enlaces a otros sitios de internet pertenecientes a terceros de los cuales no se hace responsable.
  strong VI -	POLÍTICA DE PROPIEDAD INTELETUAL E INDUSTRIAL
  p El titular manifiesta tener los derechos de propiedad intelectual e industrial del sitio web incluyendo imágenes, archivos de audio o video, logotipos, marcas, colores, estructuras, tipografías, diseños y demás elementos que lo distinguen, protegidos por la legislación mexicana e internacional en materia de propiedad intelectual e industrial.
  p El usuario se compromete a respetar los derechos de propiedad industrial e intelectual del titular pudiendo visualizar los elementos del sitio web, almacenarlos, copiarlos e imprimirlos exclusivamente para uso personal.
  strong VII -	LEGISLACIÓN Y JURISDICCIÓN APLICABLE
  p La relación entre el usuario y el titular se regirá por las legislaciones aplicables en México
  p Q-Restaurant  no se responsabiliza por la indebida utilización del contenido, productos y/o servicios del sitio web y del incumplimiento de los presentes términos y condiciones.



</template>

<style scoped lang="scss">
p{
  font-size: 1.2em;
  text-align: justify;
}
strong{
  text-transform: uppercase;
}
</style>
