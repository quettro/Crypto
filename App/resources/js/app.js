import './Vendor/hCaptcha/api.min';
import './bootstrap';

import Notification from './Al/Notification';

import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.Alpine.data('Notification', Notification);
window.Alpine.start();
