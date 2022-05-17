import { Controller } from '@hotwired/stimulus';
import { Toast }  from 'bootstrap';

export default class extends Controller {
    static values = {
    }

    connect() {
        console.log('toast controller');
        this.toast = new Toast(this.element);
        this.toast.show();
        
    }

    show() {
        this.toast.show();
    }

    hide() {
        this.toast.hide();
    }

    dispose() {
        this.toast.dispose();
    }

}
