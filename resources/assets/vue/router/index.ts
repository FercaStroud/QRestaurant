import Vue from 'vue';
import Router from 'vue-router';

import NProgress from 'nprogress';

const BaseAuth = () => import(/* webpackChunkName: "login" */'@/views/auth/components/BaseAuth.vue');
const AuthLogin = () => import(/* webpackChunkName: "login" */'../views/auth/AuthLogin.vue');
const AuthRegister = () => import('../views/auth/AuthRegister.vue');
const AuthResetLink = () => import('../views/auth/AuthResetLink.vue');
const AuthResetForm = () => import('../views/auth/AuthResetForm.vue');

const Example = () => import(/* webpackChunkName: "example" */'../views/example/Example.vue');
const Home = () => import('../views/home/Home.vue');
const Messages = () => import('../views/messages/Messages.vue');
const Users = () => import('../views/users/Users.vue');
const UsersGraphQL = () => import('../views/users/UsersGraphQL.vue');

const Menus = () => import('../views/menus/Menus.vue');
const Categories = () => import('../views/categories/Categories.vue');
const Products = () => import('../views/products/Products.vue');
const Payments = () => import('../views/payments/Payments.vue');
const Settings = () => import('../views/settings/Settings.vue');

const TermsOfUse = () => import('../views/legal/TermsOfUse.vue');
const PrivacyPolicy = () => import('../views/legal/PrivacyPolicy.vue');
const Menu = () => import('../views/menus/Public.vue');

import userTypes from '@/utils/userTypes';

import store from '../store';

Vue.use(Router);

const router = new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
      meta: {
        title: {
          key: 'strings.home',
        },
        auth: {
          roles: [userTypes.ADMIN],
          forbiddenRedirect: '/example',
        },
      },
    },
    {
      path: '/example',
      name: 'example',
      component: Example,
      meta: {
        title: {
          key: 'strings.example',
        },
        auth: true,
      },
    },
    {
      path: '/menus',
      name: 'menus',
      component: Menus,
      meta: {
        title: {
          key: 'strings.menus',
        },
        auth: true,
      },
    },
    {
      path: '/categories/:id',
      name: 'categories',
      component: Categories,
      meta: {
        title: {
          key: 'strings.categories',
        },
        auth: {
          roles: userTypes.NORMAL,
          forbiddenRedirect: '/',
        },
      },
    },
    {
      path: '/products/:id',
      name: 'products',
      component: Products,
      meta: {
        title: {
          key: 'strings.products',
        },
        auth: {
          roles: userTypes.NORMAL,
          forbiddenRedirect: '/',
        },
      },
    },
    {
      path: '/user/payments',
      name: 'user_payments',
      component: Payments,
      meta: {
        title: {
          key: 'strings.payments',
        },
        auth: {
          roles: userTypes.NORMAL,
          forbiddenRedirect: '/',
        },
      },
    },
    {
      path: '/user/settings',
      name: 'user_settings',
      component: Settings,
      meta: {
        title: {
          key: 'strings.settings',
        },
        auth: {
          roles: userTypes.NORMAL,
          forbiddenRedirect: '/',
        },
      },
    },
    {
      path: '/messages',
      name: 'messages',
      component: Messages,
      meta: {
        title: {
          key: 'strings.messages',
        },
        auth: true,
      },
    },
    {
      path: '/terms-of-use',
      name: 'termsOFUse',
      component: TermsOfUse,
      meta: {
        title: {
          key: 'strings.terms_of_use',
        },
        auth: false,
      },
    },
    {
      path: '/privacy-policy',
      name: 'privacyPolicy',
      component: PrivacyPolicy,
      meta: {
        title: {
          key: 'strings.privacy_policy',
        },
        auth: false,
      },
    },
    {
      path: '/users',
      name: 'users',
      component: Users,
      meta: {
        title: {
          key: 'users.title',
          length: 2,
        },
        auth: {
          roles: [userTypes.ADMIN],
          forbiddenRedirect: '/example',
        },
      },
    },
    {
      path: '/users/graphql',
      name: 'users.graphql',
      component: UsersGraphQL,
      meta: {
        title: {
          key: 'users.title',
          length: 2,
        },
        auth: {
          roles: [userTypes.ADMIN],
          forbiddenRedirect: '/example',
        },
      },
    },
    {
      path: '/menu/:slug',
      name: 'strings.menu',
      component: Menu,
      meta: {
        title: {
          key: 'menu.title',
        },
        auth: false,
      },
    },
    {
      path: '/auth',
      component: BaseAuth,
      children: [{
        path: 'login',
        name: 'auth.login',
        component: AuthLogin,
        meta: {
          title: {
            key: 'login.login',
          },
          auth: false,
        },
      },
        {
          path: '/registrations/new',
          name: 'auth.register',
          component: AuthRegister,
          meta: {
            title: {
              key: 'login.register',
            },
            auth: false,
          },
        },
        {
          path: 'password/reset',
          name: 'auth.reset',
          component: AuthResetLink,
          meta: {
            title: {
              key: 'login.reset_password',
            },
            auth: false,
          },
        },
        {
          path: 'password/reset/:token',
          name: 'auth.reset.token',
          component: AuthResetForm,
          meta: {
            title: {
              key: 'login.reset_password',
            },
            auth: false,
          },
        }],
    },

    {
      path: '*',
      redirect: '/',
    },
  ],
});

declare let authenticated;

const progressShowDelay = 100;
let routeResolved = false;

router.afterEach(() => {
  routeResolved = true;
  NProgress.done();
});

router.beforeEach((to, from, next) => {
  let {user} = (<any>store.state).auth;
  const {auth} = to.meta;

  let homePath = user.home_path;

  if (user.id && to.name == 'auth.login' && from.name == homePath) {
    next(false);
    return;
  }

  if (!authenticated && to.name == 'auth.login') {
    store.dispatch('setTitle', '');
    next();
    return;
  }

  routeResolved = false;
  setTimeout(() => {
    if (!routeResolved) {
      NProgress.start();
    }
  }, progressShowDelay);

  function authCheck() {
    if (auth && (!user.id)) {
      authenticated = false;
      router.push({
        name: 'auth.login',
      });
      return;
    }

    if (from.name || to.path.includes('/dashboard')) {
      if (to.name == 'public.home') {
        store.dispatch('setTitle', '');
      } else {
        const { title } = to.meta;
        store.dispatch('setTitle', Vue.i18n.translate(title.key, null, title.length));
      }
    }

    if (user.id) {
      authenticated = true;

      if (auth) {
        next();
      } else {
        homePath = user.home_path;

        next({
          name: homePath,
        });
      }
      return;
    }

    next();
  }

  if (!user.id) {
    store.dispatch('auth/checkUser', async (res) => {
      if (!res) {
        user = null;
      } else {
        await res;
      }

      user = (<any>store.state).auth.user;

      authCheck();
    });

    return;
  }

  authCheck();
});

export default router;
