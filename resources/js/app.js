require('./bootstrap');

// import Calendar from 'v-calendar/lib/components/calendar.umd'
// import DatePicker from 'v-calendar/lib/components/date-picker.umd'

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Server-Side-Up Components

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('single-file-upload', require('./components/SingleFileUpload.vue').default);
Vue.component('multiple-file-upload', require('./components/MultipleFileUpload.vue').default);
Vue.component('select-file-upload', require('./components/SelectFileUpload.vue').default);
Vue.component('file-progress', require('./components/FileProgress.vue').default);
Vue.component('file-preview', require('./components/FilePreview.vue').default);

// Vue.component('calendar', Calendar);
// Vue.component('date-picker', DatePicker);

// Custom Components

Vue.component('dropdown', require('./components/Dropdown.vue').default);
Vue.component('drop-menu', require('./components/DropMenu.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});