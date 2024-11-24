import './bootstrap'; //import bootstrap

// // Listen to the channel and event
window.Echo.channel("notifications")
    .listen(".post.created", (data) => {
        console.log("Pusher Notification received:", data);
        toastr.success(
            `<div class="notification-content">
                <i class="fas fa-user"></i> <span>${data.author}</span>
                <i class="fas fa-book" style="margin-left: 20px;"></i> <span>${data.title}</span>
            </div>`,
            'New Post Notification', {
                closeButton: true,
                progressBar: true,
                timeOut: 0, // Set timeOut to 0 to make it persist until closed
                extendedTimeOut: 0, // Ensure the notification stays open
                positionClass: 'toast-top-right',
                enableHtml: true
            }
        );
        // alert(`New Post by ${data.author}: ${data.title}`);
    });


// axios.get('/api/user') // API থেকে ইউজার ডেটা
// .then(response => {
//     let user_id = response.data.id; // User ID
//     Echo.private('user.' + user_id)
//         .listen('.category.created', (event) => {
//             console.log('Category created:', event.category);
//             toastr.info('New category created: ' + event.category.name);
//         });
// });


import mixins from './mixins'
import { createApp } from 'vue';

//import MainApp
import Home from './components/Home.vue';

const app = createApp({}); //vue instance

app.component('home', Home);

app.mixin(mixins);

app.mount('#app');