import { Component, inject, OnInit, signal, viewChild } from '@angular/core';
import { ActivatedRoute, RouterLink } from '@angular/router';
import { CoursDetail } from '../../../models/cours_detail';
import { CoursService } from '../../../services/cours-service';
import { Chargement } from "../../utils/chargement/chargement";
import { FormulaireEvaluation } from "../formulaire-evaluation/formulaire-evaluation";
import { Evaluation } from '../../../models/evaluation';
import { EvaluationService } from '../../../services/evaluation-service';
import { ModalConfirmation } from "../../utils/modal-confirmation/modal-confirmation";
import { Etudiant } from '../../../models/etudiant';
import { FormulaireAjoutCours } from "../../etudiants/formulaire-ajout-cours/formulaire-ajout-cours";
import { NgIconComponent, provideIcons, NgIcon } from '@ng-icons/core';
import { heroPencilSquare, heroTrash } from '@ng-icons/heroicons/outline';

@Component({
  selector: 'app-cours-details-component',
  imports: [Chargement, FormulaireEvaluation, ModalConfirmation, FormulaireAjoutCours, NgIcon, RouterLink],
  providers: [provideIcons({heroPencilSquare, heroTrash})],
  templateUrl: './cours-details-component.html',
  styleUrl: './cours-details-component.css',
})
export class CoursDetailsComponent {

  route = inject(ActivatedRoute)
  private coursService = inject(CoursService)
  private evalService = inject(EvaluationService)
  private formulaireEval = viewChild(FormulaireEvaluation)
  protected etudiantsSelectionne = signal(true)
  protected afficherFormulaireEvaluation = signal(false)
  protected afficherFormulaireEtudiant = signal(false)
  evaluationSelectionnee = signal<Evaluation | null>(null)
  evalEnSupression = signal<Evaluation | null>(null)
  etudiantEnSupression = signal<Etudiant | null>(null)

  coursId = signal<number | null>(
    Number(this.route.snapshot.paramMap.get('id'))
  );
  
  coursResource = this.coursService.coursParId(this.coursId);

  tabSelect(etuSelect: boolean) {
    this.etudiantsSelectionne.set(etuSelect)
  }

  toggleFormEval() {
    this.afficherFormulaireEvaluation.update((visible) => visible = !visible)
    if(!this.afficherFormulaireEvaluation()) {
      this.formulaireEval()?.resetFormulaire();
      this.evaluationSelectionnee.set(null);
    }
  }

  toggleFormEtu() {
    this.afficherFormulaireEtudiant.update((visible) => visible = !visible)
  }

  modifierEval(evaluation: Evaluation) {
    this.evaluationSelectionnee.set(evaluation)
    this.afficherFormulaireEvaluation.set(true)
  }

  refreshEvals() {
    this.coursResource.reload()
    this.afficherFormulaireEvaluation.set(false);
    this.evaluationSelectionnee.set(null);
  }

  refreshEtu() {
    this.coursResource.reload()
    this.afficherFormulaireEtudiant.set(false);
  }

  supprimerEvaluation() {
    this.evalService.supprimerEval(this.evalEnSupression()!.id).subscribe({
      next: () => {
        this.evalEnSupression.set(null);
        this.coursResource.reload()
      },
      error: (error) => {
        console.error(error)
      }
    })
    
  }

  retirerEtudiant() {
    this.coursService.retirerEtudiant(this.coursResource.value()!.data!.id, this.etudiantEnSupression()!.no_etudiant).subscribe({
      next: () => {        
        this.etudiantEnSupression.set(null)
        this.coursResource.reload()
      },
      error: (error) => {
        console.error(error)
      }
    })
  }

  onFichierSelectionne(event: Event) {
    const input = event.target as HTMLInputElement
    if (!input.files?.length) return

    this.importerEtudiants(input.files[0])
  }

  importerEtudiants(fichier: File) {
    this.coursService.importerEtudiants(this.coursId()!, fichier).subscribe({
      next: (res) => {
        console.log(`${res.importes} étudiants importés`)
        this.coursResource.reload()
      },
      error: (err) => console.error(err)
    })
  }
}
