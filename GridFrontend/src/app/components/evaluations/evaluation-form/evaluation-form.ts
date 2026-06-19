import { Component, computed, inject, input, output } from '@angular/core';
import { FormArray, FormBuilder, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { CritereService } from '../../../services/critere-service';
import { provideIcons, NgIcon } from '@ng-icons/core';
import { heroPlus, heroTrash } from '@ng-icons/heroicons/outline';
import { Critere } from '../../../models/critere';
import { Niveau } from '../../../models/niveau';

@Component({
  selector: 'app-evaluation-form',
  imports: [ReactiveFormsModule, NgIcon],
  providers: [provideIcons({ heroPlus, heroTrash })],
  templateUrl: './evaluation-form.html',
  styleUrl: './evaluation-form.css',
})
export class EvaluationForm {

  ngOnInit() {
  this.formCritere.patchValue({
    ordre: this.ordreCritere()
  })

  // Si un critère alors on modifie
  if (this.critere()) {
    this.formCritere.patchValue({
      titre:       this.critere()!.titre,
      description: this.critere()!.description,
      ordre:       this.critere()!.ordre,
    })

    // Remplacer les niveaux par défaut par ceux du critère
    this.niveaux.clear()
    this.critere()!.niveaux.forEach(n => {
      this.niveaux.push(this.nouveauNiveau(n.label, n.points, n.description))
    })
  }
}

  private formBuilder = inject(FormBuilder)
  private critereService = inject(CritereService)

  evaluationId = input.required<number>()
  nbCritere = input.required<number>()
  critere = input<Critere | null>(null)
  critereCree  = output<void>()

  ordreCritere = computed(() => this.nbCritere() + 1)

  formCritere = this.formBuilder.group({
      titre:       ['', Validators.required],
      description: [''],
      ordre:       [0],
      niveaux:     this.formBuilder.array([
      this.nouveauNiveau('Excellent',    5, ''),
      this.nouveauNiveau('Très bien', 4, ''),
      this.nouveauNiveau('Bien',   3, ''),
      this.nouveauNiveau('Insuffisant',   2, ''),
      this.nouveauNiveau('Non observé',  0, ''),
    ])
  })

  // Accesseur pratique pour éviter le cast répété dans le template
  get niveaux(): FormArray {
    return this.formCritere.get('niveaux') as FormArray
  }

  nouveauNiveau(label = '', points = 0, description = ''): FormGroup {
  return this.formBuilder.group({
    label:       [label, Validators.required],
    points:      [points, [Validators.required, Validators.min(0)]],
    description: [description],
  })
}

  ajouterNiveau() {
    this.niveaux.push(this.nouveauNiveau())
  }

  supprimerNiveau(index: number) {
    if (this.niveaux.length > 1) {
      this.niveaux.removeAt(index)
    }
  }

  saveCritere(event: Event) {
    event.preventDefault()
    if (this.formCritere.invalid) return

    const payload: Omit<Critere, 'id'> = {
      evaluation_id: this.evaluationId(),
      titre:         this.formCritere.getRawValue().titre ?? '',
      description:   this.formCritere.getRawValue().description ?? '',
      ordre:         this.formCritere.getRawValue().ordre ?? 0,
      niveaux:       this.formCritere.getRawValue().niveaux as Niveau[],
    }

    if (this.critere()) {
    // Modification
      this.critereService.modifierCritere(this.critere()!.id, payload).subscribe({
        next: () => this.critereCree.emit(),
        error: (err: Error) => console.error(err)
      })
    } 
    else {
      // Création
      this.critereService.creerCritere(payload).subscribe({
        next: () => {
          this.formCritere.reset()
          this.niveaux.clear()
          this.niveaux.push(this.nouveauNiveau())
          this.critereCree.emit()
        },
        error: (err) => console.error(err)
      })
    }

  }
}
