export default {
  fields: [
    {
      key: 'index',
      label: '#',
    },
    {
      key: 'image_src',
    },
    {
      key: 'name',
    },
    {
      key: 'category_name',
    },
    {
      key: 'description',
    },
    {
      key: 'price',
    },
    {
      key: 'created_at',
    },
    {
      key: 'updated_at',
    },
    {
      key: 'actions',
    },
  ],
  products: [],
  pagination: {
    currentPage: 1,
    perPage: 5,
    totalProducts: 0,
    totalPages: 0,
  },
  form:{},
  isModalAdd: false,
  isLoading: false,
  isModalLoading: false,
  isModalVisible: false,
};
