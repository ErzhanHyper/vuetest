<template>
   <div>
      <main-header></main-header>
      <main class="pt-5">
         <router-view :auth="auth"></router-view>
      </main>
   </div>
</template>

<script>
export default {

   data(){
      return {
         auth:null,
         user:null,
         authenticated: auth.check(),
      }
   },

   mounted() {
      Event.$on('userLoggedIn', () => {
         this.authenticated = true;
         this.user = auth.user;
      });

   },

   methods:{

   }

}
</script>
