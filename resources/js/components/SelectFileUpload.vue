<style>
  input[type="file"]{
    position: absolute;
    top: -500px;
  }

  div.file-listing{
    width: 200px; border: solid 2px blue;
  }

  span.remove-file{
    color: red;
    cursor: pointer;
    float: right;
  }
</style>

<template>
  <div class="w-full bg-gray-300 p-2 mt-2">

    <div class=" "><b>Selectable File Upload Component</b></div>

  <div class="w-full">
      <label class>Select Files
        <input type="file" id="files" ref="files" multiple v-on:change="handleFilesUpload()"/>
      </label>
  </div>

  <div class="w-full">
      <div v-for="(file, key) in files" class="file-listing">{{ file.name }} <span class="remove-file" v-on:click="removeFile( key )">Remove</span></div>
  </div>

    <br>
    <div class="w-full">
      <button v-on:click="addFiles()">Add Files</button>
    </div>
    <br>
    <div class="w-full">
      <button v-on:click="submitFiles()">Submit</button>
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
        files: []
      }
    },

    /*
      Defines the method used by the component
    */
    methods: {
      /*
        Adds a file
      */
      addFiles(){
        this.$refs.files.click();
      },

      /*
        Submits files to the server
      */
      submitFiles(){
        /*
          Initialize the form data
        */
        let formData = new FormData();

        /*
          Iteate over any file sent over appending the files
          to the form data.
        */
        for( var i = 0; i < this.files.length; i++ ){
          let file = this.files[i];

          formData.append('files[' + i + ']', file);
        }

        /*
          Make the request to the POST /select-files URL
        */
        axios.post( '/select-files',
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
        Handles the uploading of files
      */
      handleFilesUpload(){
        let uploadedFiles = this.$refs.files.files;

        /*
          Adds the uploaded file to the files array
        */
        for( var i = 0; i < uploadedFiles.length; i++ ){
          this.files.push( uploadedFiles[i] );
        }
      },

      /*
        Removes a select file the user has uploaded
      */
      removeFile( key ){
        this.files.splice( key, 1 );
      }
    }
  }
</script>