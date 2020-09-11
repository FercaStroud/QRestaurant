import axios from 'axios';
import checkResponse from '@/utils/checkResponse';

const loadMenus = async ({ commit }) => {
  commit('SET_LOADING', true);

  try {
    const response = await axios.get('menus');
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      commit('SET_MENUS', response);
    }
  } catch (e) {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', { root: true });
  } finally {
    commit('SET_LOADING', false);
  }
};

const addMenu = async ({ commit }, payload) => {
  commit('SET_MODAL_LOADING', true);
  try {
    const response = await axios.post('menus', {
      name: payload.name,
      description: payload.description,
    });
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      commit('ADD_MENU', response.data);
      commit('SET_MODAL_VISIBLE', false);
    }
  } catch {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', { root: true });
  } finally {
    commit('SET_MODAL_LOADING', false);
  }
};

const editMenu = async ({ commit }, payload) => {
  const formData = new FormData();
  formData.append('id', payload.id);
  formData.append('parent_id', payload.parent_id);
  formData.append('name', payload.name);
  formData.append('description', payload.description);
  formData.append('image_src', payload.image_src);

  commit('SET_MODAL_LOADING', true);

  try {
    const response = await axios.post(`menu/${payload.id}?_method=PUT`, formData);
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      commit('UPDATE_MENU', response.data);
      commit('SET_MODAL_VISIBLE', false);
    }
  } catch {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', { root: true });
  } finally {
    commit('SET_MODAL_LOADING', false);
  }
};

const deleteMenu = async ({ commit }, payload) => {
  try {
    const response = await axios.delete(`menus/${payload.id}`);
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      commit('DELETE_MENU', payload);
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
  loadMenus,
  addMenu,
  editMenu,
  deleteMenu,
  setModalVisible,
};
