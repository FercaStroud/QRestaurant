import Vue from 'vue';

const SET_MENUS = (state, payload) => {
  state.menus = payload.data;

  /*state.pagination = {
    currentPage: payload.current_page,
    perPage: payload.per_page,
    totalMenus: payload.total,
    totalPages: payload.last_page,
  };*/
};

const ADD_MENU = (state, payload) => {
  state.menus.unshift(payload);
};

const UPDATE_MENU = (state, payload) => {
  const idx = state.menus.findIndex(u => u.id === payload.id);

  if (idx >= 0) {
    Vue.set(state.menus, idx, payload);
  }
};

const DELETE_MENU = (state, payload) => {
  const idx = state.menus.findIndex(u => u.id === payload.id);

  if (idx >= 0) {
    Vue.delete(state.menus, idx);
  }
};

const SET_LOADING = (state, payload) => {
  state.isLoading = payload;
};

const SET_MODAL_LOADING = (state, payload) => {
  state.isModalLoading = payload;
};

const SET_MODAL_VISIBLE = (state, payload) => {
  state.isModalVisible = payload;
};

const SET_MODAL_ADD = (state, payload) => {
  state.isModalAdd = payload;
};

const SET_FORM = (state, payload) => {
  state.form = payload;
};

export default {
  SET_FORM,
  SET_MODAL_ADD,
  SET_MENUS,
  ADD_MENU,
  UPDATE_MENU,
  DELETE_MENU,
  SET_LOADING,
  SET_MODAL_LOADING,
  SET_MODAL_VISIBLE,
};
