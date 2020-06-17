class Auth {
   constructor() {

      let userData = window.localStorage.getItem('user');
      this.user = userData ? JSON.parse(userData) : null;

      if(this.user){
         this.getUser();
      }
   }

   update(user){
      window.localStorage.setItem('user', JSON.stringify(user));
      this.user = user;
      if(this.user){
         this.getUser();
      }
      Event.$emit('userLoggedIn');
   }

   login (user) {
      window.localStorage.setItem('user', JSON.stringify(user));
      this.user = user;
      Event.$emit('userLoggedIn');
   }

   logout() {

      axios.post('/logout').then(response => {
         window.localStorage.setItem('user', null);
         this.user = null;
         Event.$emit('userLoggedOut');
      }).catch(error => {

      });
   }


   getUser() {
      if(this.user){
         axios.get('/get-user')
         .then(({data}) => {
            this.user = data;
         })
         .catch(({response}) => {
            if (response.status === 401) {
               this.logout();
            }
         });
      }
   }


   check () {
      return !! this.user;
   }

}



export default Auth;
