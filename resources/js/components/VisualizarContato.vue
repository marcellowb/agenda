<template>
    <div>
        <template v-if="contato">
            <b-row>
                <b-col>
                    <h3>{{ contato.nome }}</h3>
                </b-col>
            </b-row>

            <hr class="pb-2">

            <b-row class="mt-2" >
                <b-col>

                    <h5>Contatos</h5>
                    <p>
                        <b>Email: </b>{{ contato.email }}<br>
                        <b>Telefone: </b>{{ contato.telefone }}
                    </p>
                    <hr>
                    <h5>Endereço</h5>
                    <p>
                        <b>Endereço: </b>{{ contato.endereco }}<br>
                        <b>Número: </b>{{ contato.numero }}<br>
                        <b>Bairro: </b>{{ contato.bairro }}<br>
                        <b>Cidade: </b>{{ contato.cidade }}<br>
                        <b>Estado: </b>
                            <template v-if="contato.estado">{{ contato.estado.nome }}</template>
                            <template v-else>--</template>
                        <br>
                        <b>CEP: </b>{{ contato.cep }}<br>
                    </p>
                </b-col>
            </b-row>
        </template>
    </div>
</template>

<script>

import contato from '../api/contato'

export default {
    props: ['id'],
    data() {
        return {
            contato: ""
        }
    },
    mounted() {
        this.getContato()
    },
    methods: {
        async getContato(){
            await contato.get(this.id)
                .then(dados => {
                    this.contato = dados.data
                    console.log(this.contato)
                })
        },
    }
}
</script>
