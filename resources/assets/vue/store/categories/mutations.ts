import Vue from 'vue';

const SET_CATEGORIES = (state, payload) => {
  state.categories = payload.data;

  /*state.pagination = {
    currentPage: payload.current_page,
    perPage: payload.per_page,
    totalCategories: payload.total,
    totalPages: payload.last_page,
  };*/
};

const SET_CATEGORIES_WITH_PRODUCTS = (state, payload) => {
  state.categoriesWithProducts = payload;
};

const ADD_CATEGORY = (state, payload) => {
  state.categories.unshift(payload);
};

const UPDATE_CATEGORY = (state, payload) => {
  const idx = state.categories.findIndex(u => u.id === payload.id);

  if (idx >= 0) {
    Vue.set(state.categories, idx, payload);
  }
};

const DELETE_CATEGORY = (state, payload) => {
  const idx = state.categories.findIndex(u => u.id === payload.id);

  if (idx >= 0) {
    Vue.delete(state.categories, idx);
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

const SET_ADD_FILE_MODAL_VISIBLE = (state, payload) => {
  state.isAddFileModalVisible = payload;
};

export default {
  SET_FORM,
  SET_MODAL_ADD,
  SET_CATEGORIES,
  SET_CATEGORIES_WITH_PRODUCTS,
  ADD_CATEGORY,
  UPDATE_CATEGORY,
  DELETE_CATEGORY,
  SET_LOADING,
  SET_MODAL_LOADING,
  SET_MODAL_VISIBLE,
  SET_ADD_FILE_MODAL_VISIBLE,
};
