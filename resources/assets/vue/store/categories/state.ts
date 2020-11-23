export default {
  fields: [
    {
      key: 'index',
      label: '#',
    },
    {
      key: 'name',
    },
    {
      key: 'image_src',
    },
    {
      key: 'description',
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
  categories: [],
  categoriesWithProducts:[],
  pagination: {
    currentPage: 1,
    perPage: 5,
    totalCategories: 0,
    totalPages: 0,
  },
  form:{},
  isModalAdd: false,
  isLoading: false,
  isModalLoading: false,
  isModalVisible: false,
};
