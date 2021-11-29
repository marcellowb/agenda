import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: "/",
            component: () => import('./template/Template'),
            children: [
                {
                    path: '',
                    name: 'ListaContatos',
                    component: () => import('./components/ListarContatos')
                },
                {
                    path: 'contato/inserir',
                    name: 'InserirContato',
                    component: () => import('./components/InserirContato')
                },
                {
                    path: 'contato/editar/:id',
                    props: true,
                    name: 'EditarContato',
                    component: () => import('./components/EditarContato')
                },
                {
                    path: 'contato/visualizar/:id',
                    props: true,
                    name: 'VisualizarContato',
                    component: () => import('./components/VisualizarContato')
                },
            ]
        },
    ]
});

export default router;
