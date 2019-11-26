<template>
  <div class="w-full bg-gray-300 p-2">
  	
  	<div class=" ">

    <b>Single File Upload Component</b></div>

    <div class="w-full">
      <label>File
        
        <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>

        <input type="hidden" name="_token" :value="csrf">

      </label>
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
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')

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
            axios.post( '/single-file',
                formData,
                {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
              }
            ).then(function(){
          console.log('SUCCESS!!');
        })
        .catch(function(){
          console.log('FAILURE!!');
        });
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