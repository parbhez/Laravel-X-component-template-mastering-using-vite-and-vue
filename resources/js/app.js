import './bootstrap'; //import bootstrap

// // Listen to the channel and event
// window.Echo.channel("notifications").listen(".post.created", (data) => {
//     console.log("Notification received:", data);

//     if (data && data.author && data.title) {
//         toastr.info(
//             `<div class="notification-content">
//                 <i class="fas fa-user"></i> <span>${data.title}</span>
//                 <i class="fas fa-book" style="margin-left: 20px;"></i> <span>${data.author}</span>
//             </div>`,
//             "New post Notification", {
//                 closeButton: true,
//                 progressBar: true,
//                 timeOut: 0, // Persistent notification until closed
//                 extendedTimeOut: 0, // Ensure it stays open
//                 positionClass: "toast-top-right",
//                 enableHtml: true, // Allow HTML in the notification content
//             }
//         );
//     } else {
//         console.error("Invalid data received:", data);
//     }
// });

// var userId = '{{ auth()->user()->id }}';
// // Subscribe to the private channel
// window.Echo.private(`private-chat.${userId}`)
//     .listen('.PrivateMessage', (e) => {
//         console.log('New message:', e.message);
//     });





import mixins from './mixins'
import { createApp } from 'vue';

//import MainApp
import Home from './components/Home.vue';

const app = createApp({}); //vue instance

app.component('home', Home);

app.mixin(mixins);

app.mount('#app');