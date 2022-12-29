<template>
    <table class="table table-dark table-striped" id="productTable" @click="getEvent">
                  <thead>
                      <tr>
                          <th>Titulo</th>
                          <th>Precio</th>
                          <th>Stock</th>
                          <th>Acciones</th>
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
              products: [],
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
              $('#productTable').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: {
                      url: '/Products/GetAllProductsDataTable'
                      },
                      columns: [
                          { data: 'title' },
                          { data: 'price' },
                          { data: 'stock' },
                          { data: 'action' },
                      ]
              })
          },
          async getProducts(){
              try {  
                  this.load = false
                  const { data } = await axios.get('Products/GetAllProducts')
                  this.products = data.products
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
                      this.getProduct(button.getAttribute('data-id'))
                  }
                  if (button.getAttribute('role') == 'delete') {
                      this.deleteProduct(button.getAttribute('data-id'))
                  }
          },
          async getProduct(product_id){
              try {
                  const { data }  = await axios.get(`Products/GetAProduct/${product_id}`) 
                  this.$parent.editProduct(data.product)  
              } catch (error) {
                  console.error(error)
              } 
          },
          
          async deleteProduct(product_id) {
            try {
                const result = await swal.fire({
                    icon: 'info',
                    title: 'Quieres eliminar el libro?',
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar'
                })
                if (!result.isConfirmed) return
                // this.datatable.destroy()
                await axios.delete(`Products/DeleteAProduct/${product_id}`)
                this.index();
                swal.fire({
                    icon: 'success',
                    title: 'Bien ;)!',
                    text: 'Libro Eliminado!',
                })
            } catch (error) {
                console.error(error)
            }
        }
      }
  }
  </script>
  