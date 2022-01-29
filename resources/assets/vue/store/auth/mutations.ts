const SET_USER = (state, obj) => {
  state.user = obj;
};

const UPDATE_USER = (state, payload) => {
  state.user.name = payload.data.name;
  state.user.lastname = payload.data.lastname;
  state.user.second_lastname = payload.data.second_lastname;
  state.user.phone = payload.data.phone;
  state.user.address = payload.data.address;
  state.user.state = payload.data.state;
  state.user.municipality = payload.data.municipality;
  state.user.city = payload.data.city;
  state.user.country = payload.data.country;
  state.user.description = payload.data.description;

};

const SET_LOADING = (state, payload) => {
  state.userIsLoading = payload;
};

const UPDATE_COVER = (state, payload) => {
  state.user.cover = payload.cover;
};

const UPDATE_LOGO = (state, payload) => {
  console.log(payload);
  state.user.logo = payload.logo;
};

export default {
  SET_USER,
  UPDATE_USER,
  SET_LOADING,
  UPDATE_LOGO,
  UPDATE_COVER,
};
