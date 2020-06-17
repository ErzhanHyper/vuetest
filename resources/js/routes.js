import VueRouter from 'vue-router';

let routes = [
   {
      path: '/',
      name: 'Home',
      component: require('./components/pages/main/MainPage.vue').default
   },

   {
      path: '/contacts',
      component: require('./components/pages/Contact.vue').default,
   },

   {
      path: '/about',
      component: require('./components/pages/About.vue').default,
   },

   {
      path: '/catalog',
      component: require('./components/pages/Catalog.vue').default,
   },

   {
      path: '/profile',
      component: require('./components/profile/MainProfile.vue').default,
      meta: { middlewareAuth: true }
   },

   {
      path: '/login',
      name:'login',
      component: require('./components/auth/Authorization.vue').default,
   },

   {
      path: '/register',
      component: require('./components/auth/Registration.vue').default,
   },

];

const router = new VueRouter({
   routes
});


router.beforeEach((to, from, next) => {


   if (to.matched.some(route => route.meta.middlewareAuth) && (!auth.check())) {
      next({name: 'login'});
      return
   }

   if (to.path === '/login' && auth.check()) {
      next({name: 'profile'});
      return
   }

   next()

})

export default router;
