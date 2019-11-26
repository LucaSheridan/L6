
<template>
   <div class="w-full bg-gray-300 p-2 mt-2">
    
    <div class=""><b>File Upload Progress</b></div>

    <div class="w-full"><label>File
        <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
      </label>
      <br>
      <progress class="bg-green-400" max="100" :value.prop="uploadPercentage">
     
      </progress> <div> {{ uploadPercentage }} percent complete</div>
      <br>
      <button v-on:click="submitFile()">Submit</button>
    </div>
  </div>
</template>

<script>
  export default {

/*
  Defines the data used by the component
*/
data(){
  return {
    file: '',
    uploadPercentage: 0
  }
},

methods: {
      
/*
  Submits the file to the server
*/
submitFile(){
  /*
    Initialize the form data
  */
  let formData = new FormData();

  /*
    Add the form data we need to submit
  */
  formData.append('file', this.file);

/*
  Make the request to the POST /single-file URL
*/
axios.post( '/artifact/create',

  formData,
  {
    headers: {
        'Content-Type': 'multipart/form-data'
    },
    onUploadProgress: function( progressEvent ) {
      this.uploadPercentage = parseInt( Math.round( ( progressEvent.loaded * 100 ) / progressEvent.total ) );
    }.bind(this)
  }
).then(function(){
  console.log('SUCCESS!!');
})
.catch(function(){
  console.log('FAILURE!!');
})

},

  /*
  Handles a change on the file upload
*/
  handleFileUpload(){
    this.file = this.$refs.file.files[0];
   }
  }
  }

</script>