import './bootstrap';
import './libs/trix';
import { Stepper,initTE } from "tw-elements";

initTE({ Stepper });

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();