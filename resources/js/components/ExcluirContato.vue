<template>
    <div>
        <b-modal ref="modal">
            <template #modal-title>Confrmação</template>
            <div class="d-block text-center">
                <h3>Confirma a exclusão deste contato?</h3>
                <p>{{ contato.nome }}</p>
            </div>
            <b-button class="mt-3" block @click="dismiss" variant="secondary">Cancelar</b-button>
            <b-button class="mt-3" block @click="excluir" variant="danger">Excluir</b-button>
        </b-modal>
    </div>
</template>

<script>

import contato from '../api/contato'

export default {
    data() {
        return {
            contato: "",
        }
    },
    mounted() {

    },
    methods: {
        excluir(){
            contato.delete(this.contato.id)
                .then(() => {
                    this.$refs['modal'].hide()
                    this.$emit("reloadList")
                })
        },
        showModal(contato) {
            this.contato = contato
            this.$refs['modal'].show()
        },
        dismiss() {
            this.$refs['modal'].hide()
        },
    }
}
</script>
