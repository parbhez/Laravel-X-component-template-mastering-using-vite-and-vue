import './bootstrap'; //import bootstrap
import mixins from './mixins'
import { createApp } from 'vue';

//import MainApp
import Home from './components/Home.vue';

const app = createApp({}); //vue instance

app.component('home', Home);

app.mixin(mixins);

app.mount('#app');
