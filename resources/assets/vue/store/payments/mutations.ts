import Vue from 'vue';

const SET_PAYMENTS = (state, payload) => {
  state.payments = payload.data;
};

const SET_DIALOG_MESSAGE = (state, payload) => {
  state.dialogMessage = payload;
};

const SET_LOADING = (state, payload) => {
  state.isLoading = payload;
};

export default {
  SET_PAYMENTS,
  SET_LOADING,
  SET_DIALOG_MESSAGE,
};
