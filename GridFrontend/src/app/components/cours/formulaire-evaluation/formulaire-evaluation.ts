import { Component, EventEmitter, inject, input, OnInit, Output } from '@angular/core';
import { FormBuilder, ReactiveFormsModule, Validators } from '@angular/forms';
import { EvaluationService } from '../../../services/evaluation-service';
import { Evaluation } from '../../../models/evaluation';

@Component({
  selector: 'app-formulaire-evaluation',
  imports: [ReactiveFormsModule],
  templateUrl: './formulaire-evaluation.html',
  styleUrl: './formulaire-evaluation.css',
})
export class FormulaireEvaluation implements OnInit {

  ngOnInit(): void {
    if (this.evaluation()) {
      this.formEval.patchValue({
        titre:        this.evaluation()!.titre,
        description:  this.evaluation()!.description,
        ponderation:  String(this.evaluation()!.ponderation),
        points_total: String(this.evaluation()!.points_total),
      })
    }
  }

  private formBuilder: FormBuilder = inject(FormBuilder)
  private evalService: EvaluationService = inject(EvaluationService)
  coursId = input.required<number>();
  evaluation = input<Evaluation | null>(null)
  @Output() evalCree = new EventEmitter<void> ()
  
  formEval = this.formBuilder.group({
    titre: ['', Validators.required],
    description: [''],
    ponderation: ['', Validators.required],
    points_total: ['', Validators.required],    
  })

  creerEval(event: Event) {
    event.preventDefault();
    if(this.formEval.invalid) return

    const nouvelleEval: Partial<Evaluation> = {
      titre: this.formEval.value.titre!,
      description: this.formEval.value.description!,
      ponderation: Number(this.formEval.value.ponderation!),
      points_total: Number(this.formEval.value.points_total!),      
      cours_id: this.coursId()

    }

    if(this.evaluation()){
      this.evalService.modifierEval(this.evaluation()!.id, nouvelleEval).subscribe({
        next: () => {
          this.resetFormulaire
          this.evalCree.emit();
        },
        error: (error) => {
          console.error(error);
        }
      })
    }
    else{
      this.evalService.creerEval(nouvelleEval).subscribe({
        next: () => {
          this.resetFormulaire
          this.evalCree.emit();
        },
        error: (error) => {
          console.error(error);
        }
      })
    }
  }

  resetFormulaire() {
    this.formEval.reset()
  }
}
