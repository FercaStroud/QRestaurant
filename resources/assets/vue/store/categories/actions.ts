import axios from 'axios';
import checkResponse from '@/utils/checkResponse';

const loadCategoriesWithProducts = async ({ commit }, payload) => {
  commit('SET_LOADING', true);

  try {
    const response = await axios.post('categories/withProducts', payload);
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      commit('SET_CATEGORIES_WITH_PRODUCTS', response.data);
    }
  } catch (e) {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', { root: true });
  } finally {
    commit('SET_LOADING', false);
  }
};

const loadCategories = async ({ commit }, payload) => {
  commit('SET_LOADING', true);

  try {
    const response = await axios.get(`categories?menu_id=${payload.menu_id}`);
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      commit('SET_CATEGORIES', response);
    }
  } catch (e) {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', { root: true });
  } finally {
    commit('SET_LOADING', false);
  }
};

const addCategory = async ({ commit }, payload) => {

  if (payload.description === undefined) {
    payload.description = '';
  }

  const formData = new FormData();
  formData.append('parent_id', '0');
  formData.append('menu_id', payload.menu_id);
  formData.append('name', payload.name);
  formData.append('description', payload.description);
  formData.append('image_src', payload.image_src);

  commit('SET_MODAL_LOADING', true);

  try {
    const response = await axios.post('categories', formData);
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      commit('ADD_CATEGORY', response.data);
      commit('SET_MODAL_VISIBLE', false);
    }
  } catch {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', { root: true });
  } finally {
    commit('SET_MODAL_LOADING', false);
  }
};

const editCategory = async ({ commit }, payload) => {
  if (payload.description === undefined) {
    payload.description = '';
  }
  const formData = new FormData();
  formData.append('id', payload.id);
  formData.append('parent_id', payload.parent_id);
  formData.append('name', payload.name);
  formData.append('description', payload.description);
  formData.append('image_src', payload.image_src);

  commit('SET_MODAL_LOADING', true);

  try {
    const response = await axios.post(`categories/${payload.id}?_method=PUT`, formData);
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      commit('UPDATE_CATEGORY', response.data);
      commit('SET_MODAL_VISIBLE', false);
    }
  } catch {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', { root: true });
  } finally {
    commit('SET_MODAL_LOADING', false);
  }
};

const deleteCategory = async ({ commit }, payload) => {
  try {
    const response = await axios.delete(`categories/${payload.id}`);
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      commit('DELETE_CATEGORY', payload);
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
  loadCategories,
  loadCategoriesWithProducts,
  addCategory,
  editCategory,
  deleteCategory,
  setModalVisible,
};
