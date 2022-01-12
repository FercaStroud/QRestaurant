import Vue from 'vue';

const SET_LOADING = (state, payload) => {
  state.isLoading = payload;
};

export default {
  SET_LOADING,
};
