
<template> 
    <div class="card" >
        <div class="card-header d-flex justify-content-between">
            <h2>Producto</h2>
            <button @click="openModal" class="btn btn-primary">
                Crear Producto
            </button>
        </div>

        <div class="card-body">
            
                <table-component ref="table"/>
            
        </div>
        <section v-if="load_modal">
            <modal :product_data="product"/>
        </section>
    </div>
</template>

<script>

    import TableComponent from './Table.vue'
    import Modal from './Modal.vue'
export default {

    // props:[], // pasar variables entre componentes
    components:{
    TableComponent,
    Modal
}, 
    data() {
        return{
            load_modal: false,
            modal:null,
            product: null
        }
    },

    methods: {
        openModal(){
            this.load_modal = true
        setTimeout(() => {
            this.modal = new bootstrap.Modal(document.getElementById('product_modal'),{
                keyboard: false
            })
            this.modal.show();
            // Para limpiar utilizar un evento
            const modal = document.getElementById('product_modal');
            modal.addEventListener('hidden.bs.modal', () => {
            this.load_modal = false
            this.product = null
            })

        }, 200);
        },
        closeModal(){
            this.$refs.table.index()
             // this.$refs.table.datatable.destroy()
             this.modal.hide()
        },
        editProduct(product) {
				this.product = product
				this.openModal()
		}
    }
}
</script>

