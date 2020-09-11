import axios from 'axios';
import checkResponse from '@/utils/checkResponse';

const loadProducts = async ({ commit }, payload) => {
  commit('SET_LOADING', true);

  try {
    const response = await axios.get(`products?menu_id=${payload.menu_id}`);
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      commit('SET_PRODUCTS', response);
    }
  } catch (e) {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', { root: true });
  } finally {
    commit('SET_LOADING', false);
  }
};

const addProduct = async ({ commit }, payload) => {

  if (payload.description === undefined) {
    payload.description = '';
  }

  const formData = new FormData();
  formData.append('category_id', payload.category_id);
  formData.append('name', payload.name);
  formData.append('description', payload.description);
  formData.append('price', payload.price);
  formData.append('image_src', payload.image_src);

  commit('SET_MODAL_LOADING', true);

  try {
    const response = await axios.post('products', formData);
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      commit('ADD_PRODUCT', response.data);
      commit('SET_MODAL_VISIBLE', false);
    }
  } catch {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', { root: true });
  } finally {
    commit('SET_MODAL_LOADING', false);
  }
};

const editProduct = async ({ commit }, payload) => {
  if (payload.description === undefined) {
    payload.description = '';
  }

  const formData = new FormData();
  formData.append('id', payload.id);
  formData.append('category_id', payload.category_id);
  formData.append('name', payload.name);
  formData.append('description', payload.description);
  formData.append('price', payload.price);
  formData.append('image_src', payload.image_src);

  commit('SET_MODAL_LOADING', true);

  try {
    const response = await axios.post(`products/${payload.id}?_method=PUT`, formData);
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      commit('UPDATE_PRODUCT', response.data);
      commit('SET_MODAL_VISIBLE', false);
    }
  } catch {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', { root: true });
  } finally {
    commit('SET_MODAL_LOADING', false);
  }
};

const deleteProduct = async ({ commit }, payload) => {
  try {
    const response = await axios.delete(`products/${payload.id}`);
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      commit('DELETE_PRODUCT', payload);
      commit('SET_DIALOG_MESSAGE', 'front.deleted_successfully', { root: true });
    }
  } catch {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', { root: true });
  }
};

const setModalVisible = ({ commit }, payload) => {
  commit('SET_MODAL_VISIBLE', payload);
};

const setModalAdd = ({ commit }, payload) => {
  commit('SET_MODAL_ADD', payload);
};

const setForm = ({ commit }, payload) => {
  commit('SET_FORM', payload);
};

export default {
  setForm,
  setModalAdd,
  loadProducts,
  addProduct,
  editProduct,
  deleteProduct,
  setModalVisible,
};
