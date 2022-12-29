<template>

    <div class="modal fade" id="category_modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"> {{ `${is_create ? 'Crear' : 'Actualizar'} Categoria` }} </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="storeCategory" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" v-model="category.name">
              </div>
  
              <hr>
              <section class="d-flex justify-content-end mt-3">
                <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary me-1"> {{ `${is_create ? 'Crear' : 'Actualizar'} ` }}
                </button>
              </section>
            </form>
  
          </div>
          <div class="modal-footer">
  
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: ['category_data'],
    data() {
      return {
        is_create: true,
        category: {},
      }
    },
    created() {
      this.index()
    },
    methods: {
      index() {
        this.setCategory()
      },
  
      setCategory(){
        if (!this.category_data) return
        this.category = { ...this.category_data }
        this.is_create = false
      },
  
      loadFormData(){
        const form_data = new FormData()
        form_data.append('name', this.category.name);
        return form_data;
      },
  
      async storeCategory() {
        try {
          const category = this.loadFormData()
          if (this.is_create) {
            await axios.post('Categories/SaveCategory', category)
          } else {
            await axios.post(`Categories/UpdateCategory/${this.category.id}`, category)
          }
          swal.fire({
            icon: 'success',
            title: 'Grandiso!',
            text: 'Categoria almacenada!',
          })
          this.$parent.closeModal()  //Llamar al papá con el $parent
        } catch (error) {
          console.error(error)
          swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Algo salio mal!',
          })
        }
      }
    }
  }
  </script>
  
  <style>
  
  </style>