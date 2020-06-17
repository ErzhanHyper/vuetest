<template>
   <div class="container emp-profile">

      <div class="row">
         <div class="col-md-4">
            <div class="profile-img">
               <ProfilePhoto :photoData="photo" @updateParent="onUpdatePhoto"></ProfilePhoto>
            </div>
         </div>
         <div class="col-md-6">
            <div class="profile-head">

               <h6>
                  Web Developer and Designer
               </h6>
               <p class="proile-rating">RANKINGS : <span>8/10</span></p>
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-md-2">
            <button class="btn btn-primary" @click="updateProfile">Сохранить</button>
         </div>
      </div>
      <hr>
      <div class="row">
         <div class="col-md-4">
            <div class="profile-work">
               <p>WORK LINK</p>
               <a href="">Website Link</a><br/>
               <a href="">Bootsnipp Profile</a><br/>
               <a href="">Bootply Profile</a>
               <p>SKILLS</p>
               <a href="">Web Designer</a><br/>
               <a href="">Web Developer</a><br/>
               <a href="">WordPress</a><br/>
               <a href="">WooCommerce</a><br/>
               <a href="">PHP, .Net</a><br/>
            </div>
         </div>
         <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row">
                     <div class="col-md-6">
                        <label>User Id</label>
                     </div>
                     <div class="col-md-6">
                        {{user.id}}
                     </div>
                  </div>
                  <div class="row mb-2">
                     <div class="col-md-6">
                        <label>Имя</label>
                     </div>
                     <div class="col-md-6">
                        <input class="form-control" v-model="userName">
                     </div>
                  </div>
                  <div class="row mb-2">
                     <div class="col-md-6">
                        <label>Email</label>
                     </div>
                     <div class="col-md-6">
                        <input class="form-control" v-model="userEmail">
                     </div>
                  </div>
                  <div class="row mb-2">
                     <div class="col-md-6">
                        <label>Phone</label>
                     </div>
                     <div class="col-md-6">
                        <input class="form-control" v-model="userPhone">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <label>Profession</label>
                     </div>
                     <div class="col-md-6">
                        <p>Web Developer and Designer</p>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="row">
                     <div class="col-md-6">
                        <label>Experience</label>
                     </div>
                     <div class="col-md-6">
                        <p>Expert</p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <label>Hourly Rate</label>
                     </div>
                     <div class="col-md-6">
                        <p>10$/hr</p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <label>Total Projects</label>
                     </div>
                     <div class="col-md-6">
                        <p>230</p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <label>English Level</label>
                     </div>
                     <div class="col-md-6">
                        <p>Expert</p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <label>Availability</label>
                     </div>
                     <div class="col-md-6">
                        <p>6 months</p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <label>Your Bio</label><br/>
                        <p>Your detail description</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>


<script>

import ProfilePhoto from '../PhotoCroppie';

export default {
   components: {
      ProfilePhoto,
   },

   data() {
      return {
         photo: '',
         user: auth.user,
         user_name: auth.user.name,
         user_email: auth.user.email,
         user_phone: auth.user.phone,
         user_id: null,
      }
   },
   computed: {
      userName:{
         get() {
            return this.user.name;
         },
         set(val) {
            this.user_name = val;
         }
      },


      userPhone:{
         get() {
            return this.user.phone;
         },
         set(val) {
            this.user_phone = val;
         }
      },

      userEmail:{
         get() {
            return this.user.email;
         },
         set(val) {
            this.user_email = val;
         }
      }

   },

   methods: {

      onUpdatePhoto(data) {
         this.photo = data.photoData
      },

      updateProfile(){
         axios.post('/user/update', {
            name: this.user_name,
            phone:this.user_phone,
            email:this.user_email,
            photo: this.photo,
            user_id:this.user.id,
         }).then((response) => {
            auth.update(response.data)
         }).catch((response) => {
         });

      }

   },

   mounted(){
   }


}
</script>
