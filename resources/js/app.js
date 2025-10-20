import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import 'preline'


window.addEventListener('load', function () {
    if (window.HSStaticMethods) {
        window.HSStaticMethods.autoInit();
    }
});
