<template>

    <table class="table table-dark table-striped" id="categoryTable" @click="getEvent">
                  <thead>
                      <tr>
                          <th >Nombre</th>
                          <th >Acciones</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
  </template>
  
  <script>
  
  export default {
  
      data() {
          return{
              categories: [],
              datatable: {}
          }
      },
      mounted(){
          this.index()
      },
      
      methods: {
          async index(){
              this.mountDataTable(); 
          },
          mountDataTable(){
              $('#categoryTable').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: {
                      url: '/Categories/GetAllCategoriesDataTable'
                      },
                      columns: [
                          { data: 'name' },
                          { data: 'action'}
                      ]
              })
          },
          async getCategories(){
              try {  
                  this.load = false
                  const { data } = await axios.get('Categories/GetAllCategories')
                  this.categories = data.categories
                  this.load = true
                  this.index()
              }catch (error) {
                  console.log(error)
              } 
              this.mountDataTable()
          },
          getEvent(event){
              const button = event.target
                  if (button.getAttribute('role') == 'edit') {
                      this.getCategory(button.getAttribute('data-id'))
                  }
                  if (button.getAttribute('role') == 'delete') {
                      this.deletCategory(button.getAttribute('data-id'))
                  }
          },
          async getCategory(category_id){
              try {
                  const { data }  = await axios.get(`Categories/GetACategory/${category_id}`) 
                  this.$parent.editCategory(data.category)  
              } catch (error) {
                  console.error(error)
              } 
          },
          
          async deleteCategory(category_id) {
            try {
                const result = await swal.fire({
                    icon: 'info',
                    title: 'Quieres eliminar la Categoria?',
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar'
                })
                if (!result.isConfirmed) return
                this.datatable.destroy()
                await axios.delete(`Categories/DeleteACategory/${category_id}`)
                this.index();
                swal.fire({
                    icon: 'success',
                    title: 'Bien ;)!',
                    text: 'Categoria Eliminado!',
                })
            } catch (error) {
                console.error(error)
            }
        }
      }
  }
  </script>
  