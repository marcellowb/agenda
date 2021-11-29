<template>
    <div>
        <b-row>
            <b-col>
                <h2>Alteração de Contato</h2>
            </b-col>
        </b-row>

        <hr class="pb-4">

        <template v-if="showErrors">
            <b-alert show variant="danger">
                <ul class="px-4">
                    <li v-for="(error, i) in errors">
                        <ul class="px-0">
                            <li v-for="msg in error">{{ msg }}</li>
                        </ul>
                    </li>
                </ul>
            </b-alert>
        </template>

        <b-row class="mt-2">
            <b-col>
                <b-form>
                    <b-row class="mb-4">
                        <b-col>
                            <b-form-input
                                id="nome"
                                v-model="form.nome"
                                type="text"
                                placeholder="Nome"
                                maxlength="100"
                            ></b-form-input>
                        </b-col>
                    </b-row>
                    <b-row class="mb-4">
                        <b-col>
                            <b-form-input
                                id="email"
                                v-model="form.email"
                                type="text"
                                placeholder="Email"
                                maxlength="60"
                            ></b-form-input>
                        </b-col>
                        <b-col>
                            <b-form-input
                                id="telefone"
                                v-model="form.telefone"
                                type="text"
                                placeholder="Telefone"
                                maxlength="15"
                            ></b-form-input>
                        </b-col>
                    </b-row>
                    <b-row class="mb-4">
                        <b-col cols="4">
                            <b-form-input
                                id="cep"
                                v-model="form.cep"
                                type="text"
                                placeholder="Cep"
                                maxlength="10"
                                @keyup="buscaCep"
                            ></b-form-input>
                        </b-col>
                    </b-row>
                    <b-row class="mb-4">
                        <b-col cols="5">
                            <b-form-input
                                id="endereco"
                                v-model="form.endereco"
                                type="text"
                                placeholder="Endereço"
                                maxlength="60"
                            ></b-form-input>
                        </b-col>
                        <b-col cols="1">
                            <b-form-input
                                id="numero"
                                v-model="form.numero"
                                type="text"
                                ref="numero"
                                placeholder="Nº"
                                maxlength="6"
                            ></b-form-input>
                        </b-col>
                        <b-col cols="4">
                            <b-form-input
                                id="bairro"
                                v-model="form.bairro"
                                type="text"
                                placeholder="Bairro"
                                maxlength="40"
                            ></b-form-input>
                        </b-col>
                    </b-row>
                    <b-row class="mb-4">
                        <b-col cols="4">
                            <b-form-select
                                v-model="form.estado_id"
                                :options="listaEstados"
                                value-field="id"
                                text-field="nome"
                                place
                            ></b-form-select>
                        </b-col>
                        <b-col cols="6">
                            <b-form-input
                                id="cidade"
                                v-model="form.cidade"
                                type="text"
                                placeholder="Cidade"
                                maxlength="60"
                            ></b-form-input>
                        </b-col>
                    </b-row>

                    <b-button type="submit" variant="primary" @click.prevent="submitForm">Enviar</b-button>
                </b-form>
            </b-col>
        </b-row>
    </div>
</template>

<script>

import estado from '../api/estado'
import contato from '../api/contato'
import cep from '../api/cep'

export default {
    props: ['id'],
    data() {
        return {
            form: {
                nome: '',
                email: '',
                telefone: '',
                cep: '',
                endereco: '',
                numero: '',
                bairro: '',
                estado_id: '',
                cidade: '',
            },
            listaEstados: [],
            errors: "",
            showErrors: false,
        }
    },
    mounted() {
        this.getContato(),
        this.getEstados()
    },
    methods: {
        async getContato(){
            await contato.get(this.id)
                .then(dados => {
                    this.form = dados.data
                })
        },
        async getEstados(){
            await estado.list()
                .then(dados => {
                    this.listaEstados = dados.data
                })
        },
        async buscaCep(){
            if(this.form.cep.replace(/\D/g, "").length === 8){
                await cep.get(this.form.cep)
                    .then(dados => {

                        this.form.endereco = dados.data.address
                        this.form.bairro = dados.data.district
                        this.form.estado_id = dados.data.city_ibge.substring(0, 2)
                        this.form.cidade = dados.data.city
                        this.$refs.numero.focus();

                    }).catch(() => {
                        this.clearForm()
                    })
            }
            else{
                this.clearForm()
            }
        },
        clearForm(){
            this.form.endereco = ''
            this.form.numero = ''
            this.form.bairro = ''
            this.form.estado = ''
            this.form.cidade = ''
        },
        submitForm(){
            contato.update(this.form, this.id)
                .then(() => {
                    this.$router.push({name:'ListaContatos'})
                })
                .catch(errors => {
                    if(errors.response.status === 422){
                        this.errors = errors.response.data.errors;
                        this.showErrors = true
                    }
                })
        }
    }
}
</script>
