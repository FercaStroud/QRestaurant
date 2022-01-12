import Vue from 'vue';

const SET_PAYMENTS = (state, payload) => {
  state.payments = payload;
};

const SET_PAYMENT_STATUS = (state, payload) => {
  state.paymentStatus = payload;
};

const SET_LOADING = (state, payload) => {
  state.isLoading = payload;
};

export default {
  SET_PAYMENTS,
  SET_LOADING,
  SET_PAYMENT_STATUS,
};
