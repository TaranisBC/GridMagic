import { Component, computed, inject, signal } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { EvaluationService } from '../../../services/evaluation-service';
import { EvalComplete } from '../../../models/eval_complete';
import { EvaluationForm } from "../evaluation-form/evaluation-form";
import { CarteCritere } from "../../criteres/carte-critere/carte-critere";
import { Critere } from '../../../models/critere';
import { CorrectionEtudiant } from "../../criteres/correction-etudiant/correction-etudiant";
import { Etudiant } from '../../../models/etudiant';
import { ResultatService } from '../../../services/resultat-service';
import { Resultat } from '../../../models/resultat';

@Component({
  selector: 'app-evaluation-home',
  imports: [EvaluationForm, CarteCritere, CorrectionEtudiant],
  templateUrl: './evaluation-home.html',
  styleUrl: './evaluation-home.css',
})
export class EvaluationHome {
  private route = inject(ActivatedRoute)
  private evalService: EvaluationService = inject(EvaluationService)
  private resultatService: ResultatService = inject(ResultatService)

  evaluation_id = signal<number | null>(
    Number(this.route.snapshot.paramMap.get('id'))
  )

  protected critereSelectionne = signal(true)
  protected afficherFormCritere = signal(false)
  protected etudiantSelectionne: Etudiant | null = null
  protected critereModif= signal<Critere|null>(null)
  protected resultats = signal<Resultat[]>([])

  tabSelect(etuSelect: boolean) {
    this.critereSelectionne.set(etuSelect)
  }

  evalResource = this.evalService.evalAvecCritere(this.evaluation_id)

  criteresTries = computed(() => 
    [...(this.evalResource.value()?.data?.criteres ?? [])]
      .sort((a, b) => a.ordre - b.ordre)
  )

  toggleFormCritere() {
    this.afficherFormCritere.update((visible) => visible = !visible)
    if(!this.afficherFormCritere()) {
      //this.formulaireEval()?.resetFormulaire();
      this.critereModif.set(null);
    }
  }

  refreshEval() {
    this.evalResource.reload()
    this.afficherFormCritere.set(false);    
  }

  selectionnerEtu(etudiant: Etudiant) {
    this.etudiantSelectionne = etudiant
  }

  afficherModifCritere(critere: Critere) {
    this.critereModif.set(critere)
    this.afficherFormCritere.set(true)
  }
  
}
