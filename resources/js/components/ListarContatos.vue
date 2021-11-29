<template>
    <div>
        <b-row>
            <b-col>
                <h2>Lista de Contatos</h2>
            </b-col>
            <b-col align="right">
                <b-button variant="outline-primary" @click="inserirContato">Novo Contato</b-button>
            </b-col>
        </b-row>

        <b-row class="mt-2">
            <b-col>
                <b-table
                    striped
                    small
                    hover
                    :items="items"
                    :fields="fields"
                >
                    <template #cell(acoes)="data">
                        <b-icon-search @click="visualizarContato(data.item.id)" class="mr-2"></b-icon-search>
                        <b-icon-pencil @click="editarContato(data.item.id)" class="mr-2"></b-icon-pencil>
                        <b-icon-trash @click="excluirContato(data.item)" class="mr-2"></b-icon-trash>
                    </template>
                </b-table>
            </b-col>
        </b-row>
        <modal-excluir ref="delete-modal" @reloadList="getContatos"/>
    </div>
</template>

<script>
import contato from "../api/contato";
import modalExcluir from "./ExcluirContato"

export default {
    data() {
        return {
            fields: ['nome', 'email', 'telefone', 'cidade', {key: 'estado.nome', label: 'Estado'}, 'acoes'],
            items: [],
        }
    },
    components: {
        modalExcluir
    },
    mounted() {
        this.getContatos()
    },
    methods: {
        async getContatos(search){
            await contato.list()
                .then(dados => {
                    this.items = dados.data
                })
        },
        inserirContato(){
            this.$router.push({name:'InserirContato'})
        },
        visualizarContato(id){
            this.$router.push({name:'VisualizarContato', params: {id:id}})
        },
        editarContato(id){
            this.$router.push({name:'EditarContato', params: {id:id}})
        },
        excluirContato(contato){
            this.$refs['delete-modal'].showModal(contato)
        }
    }
}
</script>

<style scoped>
.b-icon{
    cursor: pointer;
}
</style>
