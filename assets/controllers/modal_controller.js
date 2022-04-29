import { Controller } from '@hotwired/stimulus';
import { Modal }  from 'bootstrap' ;

export default class extends Controller {
    static targets = ['modal'];

    static values = {
        // dismiss: Boolean
    }

    connect() {
        console.log('☕️');
        // if ( this.dismissValue ) {            
        //     // It seems that there is no difference with or without Alert() object... seems that data-bs-dismiss="alert" on template leads the event
        //     new Alert(this.element);
        // }
    }

    openModal(event) {
        const modal = new Modal(this.modalTarget);
        modal.show();
    }
}
