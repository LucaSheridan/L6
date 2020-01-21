<template>
    <div class="dropdown relative">
        
        <div class="dropdown-trigger"
             @click.prevent="isOpen = ! isOpen"
             aria-haspopup="true"
             :aria-expanded="isOpen">

            <slot name="trigger"></slot>
        </div>

            <ul v-show="isOpen"
                class="dropdown-menu absolute top-0 right-0 bg-black mt-2 py-2 rounded shadow text-white z-10"
                >
                <slot></slot>
            </ul>
        </div>
</template>

<script>
    export default {
        data() {
            return {
                isOpen: false
            };
        },
        watch: {
            isOpen(isOpen) {
                if (isOpen) {
                    document.addEventListener(
                        'click',
                        this.closeIfClickedOutside
                    );
                }
            }
        },
        methods: {
            closeIfClickedOutside(event) {
                if (! event.target.closest('.dropdown')) {
                    this.isOpen = false;
                    document.removeEventListener('click', this.closeIfClickedOutside);
                }
            }
        }
    }
</script>

