import axios from 'axios';
import checkResponse from '@/utils/checkResponse';

const loadUserPayments = async ({ commit }, payload) => {
  commit('SET_LOADING', true);

  try {
    const response = await axios.get('get/user/payments');
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      commit('SET_MAINTENANCES', response.data);
    }
  } catch (e) {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', { root: true });
  } finally {
    commit('SET_LOADING', false);
  }
};

const loadPaymentStatus = async ({ commit }, payload) => {
  commit('SET_LOADING', true);

  try {
    const response = await axios.get('get/user/payment/status');
    const checkErrors = checkResponse(response);

    if (checkErrors) {
      commit('SET_DIALOG_MESSAGE', checkErrors.message, { root: true });
    } else {
      console.log(response);
      commit('SET_PAYMENT_STATUS', response.data);
    }
  } catch (e) {
    commit('SET_DIALOG_MESSAGE', 'errors.generic_error', { root: true });
  } finally {
    commit('SET_LOADING', false);
  }
};

const setLoading = ({ commit }, payload) => {
  commit('SET_LOADING', payload);
};

export default {
  loadUserPayments,
  loadPaymentStatus,
  setLoading,
};
