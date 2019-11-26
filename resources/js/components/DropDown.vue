<template>

<div class="w-full">
    
    <button v-on:click="isHidden = !isHidden">
      <slot name="icon"></slot>
    </button>
  
    <div class="relative z-10">
  
    <div class="bg-gray-100 border-2 leading-snug w-full shadow-lg absolute mt-2 p-2 z-20" v-if="!isHidden">

         <slot name="options"></slot>

    </div>
  
  </div>

</div>

</template>

<script>

export default {
/*
  Defines the data used by the component
*/

el: '#dropdown',
data(){
  return {
    isHidden: true
    }
}
}

</script>