export default {
  fields: [
    {
      key: 'index',
      label: '#',
    },
    {
      key: 'name',
      class: 'text-center',
    },
    {
      key: 'image_src',
      class: 'text-center',
    },
    {
      key: 'description',
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
  isAddFileModalVisible: false,
};
