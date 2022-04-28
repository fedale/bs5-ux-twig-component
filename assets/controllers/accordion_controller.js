import { Controller } from '@hotwired/stimulus';
import 'bootstrap/js/dist/collapse';

export default class extends Controller {
    connect() {
        console.log('accordion_controller');
    }
}
