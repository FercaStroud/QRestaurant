import Vue from 'vue';

const SET_PAYMENTS = (state, payload) => {
  state.payments = payload.data;
};

const SET_PAYMENT_STATUS = (state, payload) => {
  state.status = payload.data;
};

const SET_DIALOG_MESSAGE = (state, payload) => {
  state.dialogMessage = payload;
};

const SET_LOADING = (state, payload) => {
  state.isLoading = payload;
};

export default {
  SET_PAYMENTS,
  SET_PAYMENT_STATUS,
  SET_LOADING,
  SET_DIALOG_MESSAGE,
};
