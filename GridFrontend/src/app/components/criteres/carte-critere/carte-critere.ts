import { Component, computed, EventEmitter, inject, input, output, Output } from '@angular/core';
import { provideIcons, NgIcon } from '@ng-icons/core';
import { Critere } from '../../../models/critere';
import { CritereService } from '../../../services/critere-service';
import { heroPencilSquare, heroTrash } from '@ng-icons/heroicons/outline';

@Component({
  selector: 'app-carte-critere',
  imports: [NgIcon],
  providers: [provideIcons({ heroPencilSquare, heroTrash })],
  templateUrl: './carte-critere.html',
  styleUrl: './carte-critere.css',
})
export class CarteCritere {
  critere = input.required<Critere>();
  points = computed(() => Math.max(...this.critere().niveaux.map(n => n.points)))
  critereModif = output<Critere>()

  private critereService = inject(CritereService)

  modifierCritere() {
    this.critereModif.emit(this.critere());
  }
}
