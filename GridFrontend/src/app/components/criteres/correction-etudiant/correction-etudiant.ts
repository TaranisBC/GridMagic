import { Component, computed, input } from '@angular/core';
import { Critere } from '../../../models/critere';
import { Etudiant } from '../../../models/etudiant';
import { Resultat } from '../../../models/resultat';
import { CorrectionCritere } from "../correction-critere/correction-critere";

@Component({
  selector: 'app-correction-etudiant',
  imports: [CorrectionCritere],
  templateUrl: './correction-etudiant.html',
  styleUrl: './correction-etudiant.css',
})
export class CorrectionEtudiant {
  etudiant   = input.required<Etudiant>()
  criteres   = input.required<Critere[]>()
  resultats  = input<Resultat[]>([])

  // Retrouver le résultat existant pour un critère
  resultatPourCritere(critereId: number): Resultat | null {
    return this.resultats().find(r => r.critere_id === critereId) ?? null
  }

  // Total des points obtenus
  totalPoints = computed(() =>
    this.resultats().reduce((acc, r) => acc + (r.points_obtenus ?? 0), 0)
  )

  pointsMax = computed(() =>
    this.criteres().reduce((acc, c) => acc + Math.max(...c.niveaux.map(n => n.points)), 0)
  )
}
