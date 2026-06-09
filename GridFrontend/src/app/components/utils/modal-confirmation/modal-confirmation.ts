import { Component, input, output } from '@angular/core';

@Component({
  selector: 'app-modal-confirmation',
  imports: [],
  templateUrl: './modal-confirmation.html',
  styleUrl: './modal-confirmation.css',
})
export class ModalConfirmation {
  titre      = input<string>('Confirmation')
  message    = input<string>('Êtes-vous sûr de vouloir continuer ?')
  labelConfirmer = input<string>('Confirmer')
  labelAnnuler   = input<string>('Annuler')
  danger     = input<boolean>(true)

  confirmer = output<void>()
  annuler   = output<void>()
}
