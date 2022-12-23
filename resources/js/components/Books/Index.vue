<template> 
    <div class="card mx-5 my-5">
        <div class="card-header d-flex justify-content-between">
            <h2>Libros</h2>
            <button @click="openModal" class="btn btn-primary">
                Crear Libro
            </button>
        </div>

        <div class="card-body">
            <section class="table-responsive" v-if="load">
                <table-component :books_data="books"/>
            </section>

                <!-- Loading -->
            <section v-else class="d-flex justify-content-center my-3 ">
                <div class="spinner-grow text-info" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </section>
        </div>
        <section v-if="load_modal">
            <modal :book_data="book"/>

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
            books:[],
            load: false,
            load_modal: false,
            modal:null,
            book: null
        }
    },
    created(){
        this.index()
    },
    methods: {
        async index(){
            await this.getBooks()
        },
        async getBooks(){
            try {  
                this.load = false
                const { data } = await axios.get('Books/GetAllBooks')
                this.books = data.books
                this.load = true
            }catch (error) {
                console.log(error)
            }
        },
        openModal(){
            this.load_modal = true
        setTimeout(() => {
            this.modal = new bootstrap.Modal(document.getElementById('book_modal'),{
                keyboard: false
            })
            this.modal.show();
            // Para limpiar utilizar un evento
            const modal = document.getElementById('book_modal');
            modal.addEventListener('hidden.bs.modal', () => {
            this.load_modal = false
            this.book = null
            })

        }, 200);
        },
        closeModal(){
            this.modal.hide()
            this.getBooks()
        },
        editBook(book) {
				this.book = book
				this.openModal()
			}
    }
}
</script>
