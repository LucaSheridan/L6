<template>
   <div class="w-full p-2 mt-2">
    
    <div class="w-full"><label>File Preview
        <input type="file" id="file" ref="file" accept="image/*" v-on:change="handleFileUpload()"/>
      </label>
     
     <div class="w-8 sm:w-16 md:w-32 lg:w-48 xl:w-64 border-2 p-2">
     <img v-bind:src="imagePreview" v-show="showPreview"/>
     </div></div>
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
    showPreview: false,
    imagePreview: ''
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
    
    /*
      Set the local file variable to what the user has selected.
    */
    this.file = this.$refs.file.files[0];

    /*
      Initialize a File Reader object
    */
    let reader  = new FileReader();

    /*
      Add an event listener to the reader that when the file
      has been loaded, we flag the show preview as true and set the
      image to be what was read from the reader.
    */
    reader.addEventListener("load", function () {
      this.showPreview = true;
      this.imagePreview = reader.result;
    }.bind(this), false);

    /*
      Check to see if the file is not empty.
    */
    if( this.file ){
      /*
        Ensure the file is an image file.
      */
      if ( /\.(jpe?g|png|gif)$/i.test( this.file.name ) ) {
        /*
          Fire the readAsDataURL method which will read the file in and
          upon completion fire a 'load' event which we will listen to and
          display the image in the preview.
        */
        reader.readAsDataURL( this.file );
      }
    }
  }
}
}
</script>