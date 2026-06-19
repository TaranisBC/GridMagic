import { Component, computed, effect, input, signal } from '@angular/core';
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

  // Copie locale mutable
  resultatsLocaux = signal<Resultat[]>([])

  constructor() {
    // Synchroniser avec l'input quand il change
    effect(() => {
      this.resultatsLocaux.set(this.resultats())
    })
  }

  updateResultat(resultat: Resultat) {
    this.resultatsLocaux.update(liste => {
      const index = liste.findIndex(r => r.critere_id === resultat.critere_id)
      if (index >= 0) {
        // Mettre à jour le résultat existant
        const copie = [...liste]
        copie[index] = resultat
        return copie
      }
      // Ajouter si nouveau résultat
      return [...liste, resultat]
    })
  }

  // Total basé sur les résultats locaux
  totalPoints = computed(() =>
    this.resultatsLocaux().reduce((acc, r) => acc + (r.points_obtenus ?? 0), 0)
  )

  pointsMax = computed(() =>
    this.criteres().reduce((acc, c) => acc + Math.max(...c.niveaux.map(n => n.points)), 0)
  )

  pourcentage = computed(() => {
    if (this.pointsMax() === 0) return 0
    return Math.round((this.totalPoints() / this.pointsMax()) * 100)
  })
}
