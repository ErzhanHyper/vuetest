<template>
   <div>

      <img :src="defaultImage" style="width: 180px; height: 180px;" class="profile_photo">
      <VueImageUploadCroppie :defaultImage.sync="defaultImage" :trans="photoTrans" :width="220" :height="220"></VueImageUploadCroppie>
   </div>
</template>

<script>
import VueImageUploadCroppie from 'vue-image-upload-croppie'

export default {
   components: {
      VueImageUploadCroppie
   },

   props: ['photoData'],

   data() {
      return {
         defaultImage: auth.user.photo != null ? '/storage/user_photo/'+auth.user.photo : '/img/user.png',
         photoTrans: {
            cropImage: 'Фото профиля',
            chooseImage:'Загрузить фото',
            confirmCutting: 'Завершить'
         },
      };
   },


   watch: {
      defaultImage: function(data) {
         if (data) {
            this.$emit('updateParent', {
               photoData:  data,
            })
         }
      }
   },

}


</script>

<style lang="scss">
button.btn.vodal-confirm-btn{
   width: 160px;
   margin: 0;
   margin-top: 10px;
}
</style>
