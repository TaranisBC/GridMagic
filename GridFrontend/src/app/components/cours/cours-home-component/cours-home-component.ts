import { ChangeDetectorRef, Component, inject, OnInit, signal, viewChild } from '@angular/core';
import { Cours } from '../../../models/cours';
import { CoursCarte } from "../cours-carte/cours-carte";
import { CoursService } from '../../../services/cours-service';
import { Subscription } from 'rxjs';
import { FormBuilder, FormsModule, ReactiveFormsModule, Validators } from '@angular/forms';
import { CoursFormulaireComponent } from "../cours-formulaire-component/cours-formulaire-component";
import { Chargement } from "../../utils/chargement/chargement";

@Component({
  selector: 'app-cours-home-component',
  imports: [
    CoursCarte,
    FormsModule,
    ReactiveFormsModule,
      CoursFormulaireComponent,
      Chargement
],
  templateUrl: './cours-home-component.html',
  styleUrl: './cours-home-component.css',
})
export class CoursHomeComponent {

  private coursService: CoursService = inject(CoursService)
  protected afficherFormulaire = signal(false)
  private formCours = viewChild(CoursFormulaireComponent)

  listeCours = this.coursService.cours;  

  refreshCours() {
    this.listeCours.reload();
    this.changerAffichage();
  }  

  changerAffichage() {
    this.afficherFormulaire.update((visible) => visible = !visible )
    if(!this.afficherFormulaire()) {
      this.formCours()?.resetFormulaire();
    }
  }

  reloadCours() {
    this.listeCours.reload()
  }

}

