export default {
  fields: [
    {
      key: 'index',
      label: '#',
    },
    {
      key: 'image_src',
      class: 'text-center',

    },
    {
      key: 'name',
      class: 'text-center',

    },
    {
      key: 'category_name',
      class: 'text-center',

    },
    {
      key: 'description',
      class: 'text-center',

    },
    {
      key: 'price',
      class: 'text-center',

    },
    {
      key: 'created_at',
      class: 'text-center',

    },
    {
      key: 'updated_at',
      class: 'text-center',

    },
    {
      key: 'actions',
      class: 'text-center',

    },
  ],
  products: [],
  pagination: {
    currentPage: 1,
    perPage: 5,
    totalProducts: 0,
    totalPages: 0,
  },
  form: {},
  isModalAdd: false,
  isLoading: false,
  isModalLoading: false,
  isModalVisible: false,
  isAddFileModalVisible: false,
};
