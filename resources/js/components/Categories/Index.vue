<template> 
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2>Categoria</h2>
            <button @click="openModal" class="btn btn-primary">
                Crear Categoria
            </button>
        </div>

        <div class="card-body">
            
                <table-component ref="table"/>
            
        </div>
        <section v-if="load_modal">
            <modal :category_data="category"/>

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
            category: null
        }
    },

    methods: {
        
        openModal(){
            this.load_modal = true
        setTimeout(() => {
            this.modal = new bootstrap.Modal(document.getElementById('category_modal'),{
                keyboard: false
            })
            this.modal.show();
            // Para limpiar utilizar un evento
            const modal = document.getElementById('category_modal');
            modal.addEventListener('hidden.bs.modal', () => {
            this.load_modal = false
            this.category = null
            })

        }, 200);
        },
        closeModal(){
            this.$refs.table.index()
             // this.$refs.table.datatable.destroy()
             this.modal.hide()
        },
        editCategory(category) {
				this.category = category
				this.openModal()
		}
    }
}
</script>

