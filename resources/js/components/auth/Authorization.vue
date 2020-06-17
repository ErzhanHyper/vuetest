<template>
   <div>
      <div class="container">
         <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
               <div id="login-box" class="col-md-12">
                  <form id="login-form" class="form" @submit.prevent="login">
                     <h3 class="text-center text-info">Авторизация</h3>
                     <div class="form-group">
                        <label for="username" class="text-info">Email:</label><br>
                        <input type="text" id="username" class="form-control" v-model="email">
                     </div>
                     <div class="form-group">
                        <label for="password" class="text-info">Пароль:</label><br>
                        <input type="text" id="password" class="form-control" v-model="password">
                     </div>
                     <div class="form-group">
                        <input type="submit" class="btn btn-info btn-md" value="Войти">
                     </div>
                  </form>
               </div>

            </div>
         </div>
      </div>
   </div>
</template>


<script>
export default {

   data () {
      return {
         email: '',
         password: '',
         authenticated: auth.check(),
         user: auth.user
      }
   },

   methods: {
      login () {
         let data = {
            email: this.email,
            password: this.password,
         };
         axios.post('/login', data).then(({data}) => {
            auth.login(data);
            if(this.$route.path != '/profile'){
               this.$router.push('/profile');
            }
         })

      }
   }


}
</script>
