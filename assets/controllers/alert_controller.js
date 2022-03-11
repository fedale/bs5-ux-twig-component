import { Controller } from '@hotwired/stimulus';
import { Alert } from 'bootstrap';

export default class extends Controller {
    connect() {
        console.log('alert_controller');
        return new Alert(this.element);
    }
}
