import Vue from 'vue';
import Router from 'vue-router';

import AuthLogin from '../views/AuthLogin.vue';
const AuthRegister = () => import('../views/AuthRegister.vue');
const AuthResetLink = () => import('../views/AuthResetLink.vue');
const AuthResetForm = () => import('../views/AuthResetForm.vue');

const Dashboard = () => import('../views/Dashboard.vue');
const Home = () => import('../views/Home.vue');
const Landing = () => import('../views/Landing.vue');
const Menu = () => import('../views/Menu.vue');
const Menus = () => import('../views/MyMenus.vue');
//const Messages = () => import('../views/Messages.vue');
const Users = () => import('../views/Users.vue');
const Categories = () => import('../views/Categories.vue');
const Products = () => import('../views/Products.vue');

import userTypes from '@/utils/userTypes';

Vue.use(Router);

const router = new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'landing',
      component: Landing,
      meta: {
        title: Vue.i18n.translate('strings.home', null),
        auth: false,
      },
    },
    {
      path: '/admin',
      name: 'home',
      component: Home,
      meta: {
        title: Vue.i18n.translate('strings.home', null),
        auth: {
          roles: userTypes.ADMIN,
          forbiddenRedirect: '/dashboard',
        },
      },
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: Dashboard,
      meta: {
        title: Vue.i18n.translate('strings.dashboard', null),
        auth: true,
      },
    },
    {
      path: '/categories/:id',
      name: 'categories',
      component: Categories,
      meta: {
        title: Vue.i18n.translate('categories.text', null),
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
        title: Vue.i18n.translate('products.text', null),
        auth: {
          roles: userTypes.NORMAL,
          forbiddenRedirect: '/',
        },
      },
    },
    {
      path: '/menus',
      name: 'menus',
      component: Menus,
      meta: {
        title: Vue.i18n.translate('strings.my_menus', null),
        auth: {
          roles: userTypes.NORMAL,
          forbiddenRedirect: '/',
        },
      },
    },
    /*{
      path: '/messages',
      name: 'messages',
      component: Messages,
      meta: {
        title: Vue.i18n.translate('strings.messages', null),
        auth: true,
      },
    },*/
    {
      path: '/users',
      name: 'users',
      component: Users,
      meta: {
        title: Vue.i18n.translate('strings.users', null),
        auth: {
          roles: userTypes.ADMIN,
          forbiddenRedirect: '/dashboard',
        },
      },
    },
    {
      path: '/login',
      name: 'auth.login',
      component: AuthLogin,
      meta: {
        title: Vue.i18n.translate('login.login', null),
        auth: false,
      },
    },
    {
      path: '/registrations/new',
      name: 'auth.register',
      component: AuthRegister,
      meta: {
        title: Vue.i18n.translate('login.register', null),
        auth: false,
      },
    },
    {
      path: '/password/reset',
      name: 'auth.reset',
      component: AuthResetLink,
      meta: {
        title: Vue.i18n.translate('login.reset_password', null),
        auth: false,
      },
    },
    {
      path: '/password/reset/:token',
      name: 'auth.reset.token',
      component: AuthResetForm,
      meta: {
        title: Vue.i18n.translate('login.reset_password', null),
        auth: false,
      },
    },
    {
      path: '/menu/:id',
      name: 'menu_view',
      component: Menu,
      meta: {
        title: 'Menu',
        auth: false,
      },
    },
    {
      path: '*',
      redirect: '/',
    },
  ],
});

// It's required for VueAuth
Vue.router = router;

export default router;
