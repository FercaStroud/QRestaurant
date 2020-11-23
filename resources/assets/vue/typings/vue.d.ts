import { AxiosInstance } from 'axios';
import VueRouter from 'vue-router';
import { Ii18n } from 'vuex-i18n';

declare module 'vue/types/vue' {
  interface Vue {
    $auth: any;
    router: VueRouter;
    // @ts-ignore
    axios: AxiosInstance;
    // @ts-ignore
    $i18n: any;
  }

  interface VueConstructor<V extends Vue = Vue> {
    $auth: any;
    router: VueRouter;
    // @ts-ignore
    axios: AxiosInstance;
    // @ts-ignore
    i18n: any;
  }
}
