<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { Action, State } from 'vuex-class';

@Component({
  components: {

  },
})
export default class Menu extends Vue {
  mounted() {
    //this.setMenu([]);
  }
}
</script>

<template lang="pug">
b-container#home(tag='main')
  h1.font-caveat {{ $t('strings.welcome') }}
</template>

<style scoped>
#home {
  padding-top: 70px;
}
</style>
