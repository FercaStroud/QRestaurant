import Vue from 'vue';
import axios from 'axios';
import checkResponse from '@/utils/checkResponse';
// import router from '../../router';

declare let authenticated;

const updateCover = async ({commit}, payload) => {

  const formData = new FormData();
  formData.append('cover', payload);

  commit('SET_LOADING', true);

  try {
    const response = await axios.post('user/update/cover', formData);
    const checkErrors = checkResponse(response);
    if (!checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, {root: true});
    } else {
      commit('UPDATE_COVER', response);
    }
  } catch {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', {root: true});
  } finally {
    commit('SET_LOADING', false);
  }
};

const updateLogo = async ({commit}, payload) => {
  const formData = new FormData();
  formData.append('logo', payload);

  commit('SET_LOADING', true);

  try {
    const response = await axios.post('user/update/logo', formData);
    const checkErrors = checkResponse(response);

    if (!checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, {root: true});
    } else {
      commit('UPDATE_LOGO', response);
    }
  } catch {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', {root: true});
  } finally {
    commit('SET_LOADING', false);
  }
};

const updateUser = async ({commit}, payload) => {
  commit('SET_LOADING', true);
  try {
    const response = await axios.post('user/update', {
      name: payload.name,
      lastname: payload.lastname,
      second_lastname: payload.second_lastname,
      phone: payload.phone,
      address: payload.address,
      state: payload.state,
      municipality: payload.municipality,
      city: payload.city,
      country: payload.country,
      description: payload.description,
      restaurant_name: payload.restaurant_name,
    });
    const checkErrors = checkResponse(response);

    if (!checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, {root: true});
    } else {
      commit('UPDATE_USER', response.data);
    }
  } catch {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', {root: true});
  } finally {
    commit('SET_LOADING', false);
  }
};

const setUserLoading = ({dispatch}, payload) => {
  dispatch('SET_LOADING', payload);
};

const checkUser = async ({dispatch}, callback) => {
  Vue.axios.post('/user')
    .then((res) => {
      dispatch('setUser', res.data);

      dispatch('loadData', null, {root: true});

      callback();
    });
};

const setUser = ({commit}, obj) => {
  if (obj.language === 'en') {
    Vue.i18n.set('en');
  }

  if (obj.is_admin) {
    if (obj.permissions.includes('super')) {
      obj.home_path = 'dashboard';
    } else {
      obj.home_path = obj.permissions[0];
    }
  }

  commit('SET_USER', obj);
};

const logout = ({commit, rootState, dispatch}) => {
  if (typeof window === 'undefined') {
    return;
  }

  localStorage.removeItem('default_auth_token');

  commit('SET_USER', {});

  if (rootState.isDarkMode) {
    dispatch('toggleDarkMode', null, {root: true});
  }

  authenticated = false;

  // router.push({
  //   name: 'auth.login',
  // });

  Vue.axios.post('/logout')
    .then(() => {
      window.location.reload();
    });
};

export default {
  updateUser,
  setUser,
  logout,
  checkUser,
  setUserLoading,
  updateCover,
  updateLogo,
};
