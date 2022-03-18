import { Controller } from '@hotwired/stimulus';
import { Alert } from 'bootstrap/js/dist/alert';

export default class extends Controller {
    connect() {
        console.log(Alert);
        return new Alert(this.element);
    }
}
