<template>

   <div>
      <div id="header">
         <div class="logo">
            <router-link to="/">LOGO</router-link>
         </div>

         <div class="menu">
            <ul class="main-menu items" id="main-menu">
               <li class="item">
                  <router-link to="/">Главная</router-link>
               </li>
               <li class="item">
                  <router-link class="link" to="/about">О нас</router-link>
               </li>
               <li class="item">
                  <router-link class="link" to="/catalog">Каталог</router-link>
               </li>
               <li class="item">
                  <router-link class="link" to="/contacts">Контакты</router-link>
               </li>
            </ul>
         </div>

         <div class="auth"  v-if="authenticated && user">
            <router-link class="link" to="/profile">Профиль</router-link>
            <a href="#"class="link" @click="logout">Выйти</a>
         </div>

         <div class="auth" v-else>
            <router-link class="link" to="/login">Войти</router-link>
            <!-- <router-link class="link" to="/register">Регистрация</router-link> -->
         </div>
      </div>
   </div>

</template>


<script>
export default {

   data() {
      return {
         authenticated: auth.check(),
         user: auth.user,
      }
   },

   methods:{
      logout(){
         auth.logout();
         this.authenticated = false

         if(this.$route.path != '/'){
            this.$router.push('/');
         }

      }
   },

   mounted(){

      Event.$on('userLoggedIn', () => {
         this.authenticated = true;
         this.user = auth.user;
      });

   }
}
</script>

<style lang="scss">
#header{
   background: #7aa0c1;
   color: #fff;
   padding: 20px;
   a{
      color: #fff;
   }
   display: flex;
   align-items: center;
   justify-content: space-between;
   .auth{
      width: 200px;
      text-align: right;
      a{
         margin: 0 10px;
      }
   }
   .logo{
      width: 200px;
      text-align: left;
   }
}

#main-menu{
   display: flex;
   align-items: center;
   justify-content: space-between;
   margin: 0;
   padding: 0;
   li{
      list-style: none;
      a{
         padding: 10px;
         margin: 0 10px;
      }
   }
}


</style>
