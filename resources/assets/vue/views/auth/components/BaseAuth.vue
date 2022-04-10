<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import TheHeader from "@/components/TheHeader.vue";

@Component({
  components: {TheHeader}
})
export default class BaseAuth extends Vue {
}
</script>

<template lang="pug">
  .bg-auth
    router-view()

</template>

<style lang="scss" scoped>
</style>
