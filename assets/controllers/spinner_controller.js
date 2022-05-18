import { Controller } from '@hotwired/stimulus';
import { Spinner }  from 'bootstrap';

export default class extends Controller {
    static values = {
    }

    connect() {
        console.log('spinner controller');
        // this.toast = new Toast(this.element);
        // this.toast.show();
        
    }

    show() {
        // this.toast.show();
    }

    hide() {
        // this.toast.hide();
    }

    dispose() {
        // this.toast.dispose();
    }

}
