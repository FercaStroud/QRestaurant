import axios from 'axios';
import checkResponse from '@/utils/checkResponse';

const loadCategories = async ({ commit }, payload) => {
  commit('SET_LOADING', true);

  try {
    const response = await axios.get(`categories?page=${payload.page}`);
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      commit('SET_CATEGORIES', response.data);
    }
  } catch (e) {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', { root: true });
  } finally {
    commit('SET_LOADING', false);
  }
};

const addCategory = async ({ commit }, payload) => {
  const category = {
    user_id: payload.user_id,
    parent_id: payload.parent_id,
    name: payload.name,
    description: payload.description,
    image_src: payload.image_src,
  };

  commit('SET_MODAL_LOADING', true);

  try {
    const response = await axios.post('categories', category);
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
  const category = {
    user_id: payload.user_id,
    parent_id: payload.parent_id,
    name: payload.name,
    description: payload.description,
    image_src: payload.image_src,
  };

  commit('SET_MODAL_LOADING', true);

  try {
    const response = await axios.put(`categories/${payload.id}`, category);
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

export default {
  loadCategories,
  addCategory,
  editCategory,
  deleteCategory,
  setModalVisible,
};
