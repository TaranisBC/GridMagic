import { Component, EventEmitter, inject, Output } from '@angular/core';
import { CoursService } from '../../../services/cours-service';
import { FormBuilder, ReactiveFormsModule, Validators } from '@angular/forms';
import { Cours } from '../../../models/cours';

@Component({
  selector: 'app-cours-formulaire-component',
  imports: [
    ReactiveFormsModule
  ],
  templateUrl: './cours-formulaire-component.html',
  styleUrl: './cours-formulaire-component.css',
})
export class CoursFormulaireComponent {
  private coursService: CoursService = inject(CoursService)
  private formBuilder: FormBuilder = inject(FormBuilder)


  @Output() coursCree = new EventEmitter<void>();

  formCours = this.formBuilder.group({
    titre: ['', Validators.required],
    description: [''],
    code: ['', Validators.required],
    semestre: ['', Validators.required],
    user_id: [1]
  })

  creerCours(event: Event) {
    event.preventDefault()
    if(this.formCours.invalid) return

    const nouveauCours: Partial<Cours> = {
      titre: this.formCours.value.titre!,
      description: this.formCours.value.description ?? "",
      code: this.formCours.value.code!,
      semestre: this.formCours.value.semestre!,
      user_id: this.formCours.value.user_id!
    }

    this.coursService.creerCours(nouveauCours).subscribe({
      next: () => {
        this.resetFormulaire();
        this.coursCree.emit();
      },
      error: (error) => {
        console.error(error)
      }
    })
  }

  resetFormulaire() {
    this.formCours.reset()
  }
}
