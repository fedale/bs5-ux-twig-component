import { Controller } from '@hotwired/stimulus';
//import { Collapse } from 'bootstrap/js/dist/collapse';

export default class extends Controller {
    connect() {
        console.log('alert_controller');
        return new Alert(this.element);
    }
}
