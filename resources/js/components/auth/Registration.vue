<template>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <form @submit.prevent="register">
               <h3 class="text-center text-info">Регистрация</h3>

               <div class="form-group row">
                  <label for="name" >Имя</label>
                  <input id="name" type="text" class="form-control" v-model="name" required autofocus>
               </div>

               <div class="form-group row">
                  <label for="email" >E-Mail</label>
                  <input id="email" type="email" class="form-control" v-model="email" required>
               </div>

               <div class="form-group row">
                  <label for="password" >Пароль</label>
                  <input id="password" type="password" class="form-control" v-model="password" required>
               </div>

               <div class="form-group row">
                  <label for="password-confirm" >Подтверждение пароля</label>
                  <input id="password-confirm" type="password" class="form-control" v-model="password_confirmation" required>
               </div>

               <div class="form-group row mb-0">
                  <button type="submit" class="btn btn-primary">
                     Зарегистрироваться
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</template>



<script>
export default {

   data(){
      return {
         name : "",
         email : "",
         password : "",
         password_confirmation : "",
      }
   },
   methods : {
      register() {

         axios.post('/api/register', {
            name: this.name,
            email: this.email,
            password: this.password,
            password_confirmation : this.password_confirmation
         })
         .then(response => {
            auth.login(response.data);
            if(this.$route.path != '/'){
               this.$router.push('/');
            }
         })
         .catch(error => {
         });

      }
   },

   mounted(){
   }
}
</script>
