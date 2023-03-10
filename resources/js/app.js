import './bootstrap'
import '../css/app.css'

import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { createApp, h } from 'vue'
import { InertiaProgress } from '@inertiajs/progress'
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m'

const appName = document.getElementsByTagName('title')[0]?.innerText || 'Laravel'

createInertiaApp({
    title: title => `${title} - ${appName}`,
    resolve: name => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup ({ el, app, props, plugin }) {
        return createApp({ render: () => h(app,props) })
            .use(ZiggyVue, Ziggy)
            .use(plugin)
            .mount(el)
    }
})

InertiaProgress.init({
    color: '#2563eb',
    showSpinner: true,
})