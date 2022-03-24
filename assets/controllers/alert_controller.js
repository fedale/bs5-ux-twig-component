import { Controller } from '@hotwired/stimulus';
import { Alert } from 'bootstrap/js/dist/alert';

export default class extends Controller {
    static values = {
        dismiss: Boolean
    }

    connect() {
        console.log('alert contorller');
        if ( this.dismissValue ) {            
            // It seems that there is no difference with or without Alert() object... seems that data-bs-dismiss="alert" on template leads the event
            new Alert(this.element);
        }
    }
}
