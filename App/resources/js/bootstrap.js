import axios from 'axios';

import('preline');
import.meta.glob(['../favicon/**', '../images/**']);

window.axios = axios;
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
