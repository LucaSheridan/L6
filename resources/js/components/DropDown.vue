<template>

  <div class="dropdown">
        
        <div class="dropdown-trigger" @click.prevent="isOpen = ! isOpen">
          <slot name="trigger"></slot>
        </div>

        <!-- <transition name="pop-out-quick"> -->
          <ul v-show="isOpen">
            <slot></slot>
        </ul>
<!--       </transition>
 -->  </div>

</template>



<script>

  export default {

    data() {
      return {
        isOpen: false
      };
    },

  // //   watch: {
  // //     isOpen(isOpen) {
  // //       if (isOpen) {
  // //         document.addEventListener('click', this.closeIfClickedOutside);
  // //       }

  // //     }
  // // },

  // methods: {
  //     closeIfClickedOutside() {
  //       alert('hi there');
  //     }
  // }
}

</script>

<style>

  .pop-out-quick-enter-active,
  .pop-out-quick-leave-active {
    transition: all 0.4s;
  }


  .pop-out-quick-enter,
  .pop-out-quick-leave {
      opacity: 0;
      transform: translateY(-7px);
  }


</style>