<template>

<div class="flex block justify-end relative bg-red-300 border-yellow-400 border-0 " v-on:click="isHidden = !isHidden">
      
    <div class="flex bg-gray-300 border-0 p-2">
      <slot name="menulabel"></slot>
    </div>
    
    <div class="flex bg-gray-300 border-0 p-2">
      <slot name="menuicon"></slot>
    </div>
  
    <div class="bg-gray-100 border-gray-500 border-2 text-left overflow-visible leading-snug absolute mt-10 p-2 z-20" v-if="!isHidden">

         <slot name="menuitems"></slot>

    </div>
  
  </div>

</div>

</template>

<script>

export default {
/*
  Defines the data used by the component
*/

el: '#dropmenu',
data(){
  return {
    isHidden: true
    }
}
}

</script>