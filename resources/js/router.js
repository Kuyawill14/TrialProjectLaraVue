import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import dashboard from './components/MainApp'
import home from './components/dashboard'
import axios from 'axios'
let routes = [

    {
        path: '/admin',
        component: () => import('./components/login'),
        name: 'login'
    },
      {
          path: '/',
          component: () => import('./components/client/main.vue'),
          name: 'Homepage'
      },
    /*  {
         path: '/dashboard',
         component: dashboard,
         children: [{
             path: '/',
             component: home
         }],


     }, */
    {
        path: '/dashboard',
        component: dashboard,
        children: [{
                path: '',
                component: home,
                beforeEnter: (to, form, next) => {
                    axios.get('/api/authenticated').then(() => {
                        next()
                    }).catch(() => {
                        return next({
                            name: "login"
                        })
                    })
                },
            },
            {
                path: 'users',
                component: () => import('./components/users'),
                beforeEnter: (to, form, next) => {
                    axios.get('/api/authenticated').then(() => {
                        next()
                    }).catch(() => {
                        return next({
                            name: "login"
                        })
                    })
                },
            },
            {
                path: 'sample2',
                component: () => import('./components/page3'),
                beforeEnter: (to, form, next) => {
                    axios.get('/api/authenticated').then(() => {
                        next()
                    }).catch(() => {

                        return next({
                            name: "login"
                        });

                    })
                },
            },
            {
                path: 'BikeInformation',
                component: () => import('./components/Bikes/Information'),
                beforeEnter: (to, form, next) => {
                    axios.get('/api/authenticated').then(() => {
                        next()
                    }).catch(() => {

                        return next({
                            name: "login"
                        });

                    })
                },
            },
            {
                path: 'BikeCategory',
                component: () => import('./components/Bikes/category'),
                beforeEnter: (to, form, next) => {
                    axios.get('/api/authenticated').then(() => {
                        next()
                    }).catch(() => {

                        return next({
                            name: "login"
                        });

                    })
                },
            },
            {
                path: 'Payment',
                component: () => import('./components/payments'),
                beforeEnter: (to, form, next) => {
                    axios.get('/api/authenticated').then(() => {
                        next()
                    }).catch(() => {

                        return next({
                            name: "login"
                        });

                    })
                },
            },
             {
                 path: 'Setting',
                 component: () => import('./components/settings'),
                 beforeEnter: (to, form, next) => {
                     axios.get('/api/authenticated').then(() => {
                         next()
                     }).catch(() => {

                         return next({
                             name: "login"
                         });

                     })
                 },
             },
            
        ],



    },
    {
        path: '/registerUser',
        component: () => import('./components/register'),
        name: 'Register'
    },

    {
        path: '/uploadPhoto',
        component: () => import('./components/page3'),
        name: 'uploadPhoto'
    }



]

export default new Router({
    mode: 'history',
    routes
})
