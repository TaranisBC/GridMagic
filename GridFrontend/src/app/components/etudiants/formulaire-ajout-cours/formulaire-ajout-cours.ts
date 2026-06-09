import { Component, EventEmitter, inject, input, Output } from '@angular/core';
import { CoursService } from '../../../services/cours-service';
import { FormBuilder, Validators, ReactiveFormsModule } from '@angular/forms';
import { Etudiant } from '../../../models/etudiant';

@Component({
  selector: 'app-formulaire-ajout-cours',
  imports: [ReactiveFormsModule],
  templateUrl: './formulaire-ajout-cours.html',
  styleUrl: './formulaire-ajout-cours.css',
})
export class FormulaireAjoutCours {
  private coursService: CoursService = inject(CoursService)
  private formBuilder: FormBuilder = inject(FormBuilder)
  cours_id = input.required<number>()


  @Output() etudiantAjoute = new EventEmitter<void>();

  formEtudiant = this.formBuilder.group({
    no_etudiant: ['', Validators.required],    
    prenom: ['', Validators.required],
    nom: ['', Validators.required]    
  })

  ajouterEtudiant(event: Event) {
    event.preventDefault()
    if(!this.formEtudiant.valid)  return

    const nouvelEtudiant: Etudiant = {
        no_etudiant: this.formEtudiant.value.no_etudiant!,
        prenom: this.formEtudiant.value.prenom!,
        nom: this.formEtudiant.value.nom!,
    }
    this.coursService.ajouterEtudiant(this.cours_id(), nouvelEtudiant).subscribe({
      next: () => {        
        this.etudiantAjoute.emit();
      },
      error: (error) => {
        console.error(error)
      }
    })
  }

}
