import Vue from 'vue';

const SET_CATEGORIES = (state, payload) => {
  state.categories = payload.data;

  state.pagination = {
    currentPage: payload.current_page,
    perPage: payload.per_page,
    totalCategories: payload.total,
    totalPages: payload.last_page,
  };
};

const ADD_CATEGORY = (state, payload) => {
  state.categories.unshift(payload);
};

const UPDATE_CATEGORY = (state, payload) => {
  const idx = state.users.findIndex(u => u.id === payload.id);

  if (idx >= 0) {
    Vue.set(state.users, idx, payload);
  }
};

const DELETE_USER = (state, payload) => {
  const idx = state.users.findIndex(u => u.id === payload.id);

  if (idx >= 0) {
    Vue.delete(state.users, idx);
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

export default {
  SET_CATEGORIES,
  ADD_CATEGORY,
  UPDATE_CATEGORY,
  DELETE_USER,
  SET_LOADING,
  SET_MODAL_LOADING,
  SET_MODAL_VISIBLE,
};
