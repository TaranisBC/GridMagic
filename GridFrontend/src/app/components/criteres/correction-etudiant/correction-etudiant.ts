import { Component, computed, effect, inject, input, signal } from '@angular/core';
import { Critere } from '../../../models/critere';
import { Etudiant } from '../../../models/etudiant';
import { Resultat } from '../../../models/resultat';
import { CorrectionCritere } from "../correction-critere/correction-critere";
import { CommentaireService } from '../../../services/commentaire-service';
import { heroArrowDownTray, heroArrowPath } from '@ng-icons/heroicons/outline'
import { provideIcons, NgIcon } from '@ng-icons/core';
import { EvaluationService } from '../../../services/evaluation-service';

@Component({
  selector: 'app-correction-etudiant',
  imports: [CorrectionCritere, NgIcon],
  providers: [provideIcons({ heroArrowDownTray, heroArrowPath })],
  templateUrl: './correction-etudiant.html',
  styleUrl: './correction-etudiant.css',
})
export class CorrectionEtudiant {

  etudiant   = input.required<Etudiant>()
  criteres   = input.required<Critere[]>()
  resultats  = input<Resultat[]>([])
  private evalId = computed(() => this.criteres()[0]?.evaluation_id ?? 0)
  private noEtudiant = computed(() => this.etudiant().no_etudiant)
  private commentaireService = inject(CommentaireService)

  private evalService    = inject(EvaluationService)
  telechargerPdfLoading  = signal(false)

  // Méthode
telechargerPdf() {
  this.telechargerPdfLoading.set(true)
  const nom = `${this.etudiant().no_etudiant}_${this.etudiant().nom}_${this.etudiant().prenom}.pdf`
  
  this.evalService.telechargerPdf(
    this.criteres()[0]?.evaluation_id,
    this.etudiant().no_etudiant,
    nom
  ).add(() => this.telechargerPdfLoading.set(false))
}

  // Retrouver le résultat existant pour un critère
  resultatPourCritere(critereId: number): Resultat | null {
    return this.resultats().find(r => r.critere_id === critereId) ?? null
  }

  // Copie locale mutable
  resultatsLocaux = signal<Resultat[]>([])

  correctionGeneraleResource = this.commentaireService.getCommentaireGeneral(
    this.evalId,
    this.noEtudiant
  )
  commentaireGeneral  = signal<string>('')
  savingGeneral       = signal<boolean>(false)

  constructor() {
    // Synchroniser avec l'input quand il change
    effect(() => {
      this.resultatsLocaux.set(this.resultats())
    })

    // Synchroniser le commentaire général quand la resource charge
    effect(() => {
      const cg = this.correctionGeneraleResource.value()?.data
      this.commentaireGeneral.set(cg?.commentaire ?? '')
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

  sauvegarderCommentaireGeneral() {
    if (!this.commentaireGeneral().trim()) return
    this.savingGeneral.set(true)

    this.commentaireService.sauvegarder({
      no_etudiant:         this.noEtudiant(),
      evaluation_id:       this.evalId(),
      commentaire: this.commentaireGeneral(),
    }).subscribe({
      next: () => this.savingGeneral.set(false),
      error: (err) => {
        this.savingGeneral.set(false)
        console.error(err)
      }
    })
  }
}
