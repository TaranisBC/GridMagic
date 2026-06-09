import { Component, inject, signal } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { EvaluationService } from '../../../services/evaluation-service';
import { EvalComplete } from '../../../models/eval_complete';

@Component({
  selector: 'app-evaluation-home',
  imports: [],
  templateUrl: './evaluation-home.html',
  styleUrl: './evaluation-home.css',
})
export class EvaluationHome {
  private route = inject(ActivatedRoute)
  private evalService: EvaluationService = inject(EvaluationService)
  evaluation_id = signal<number | null>(
    Number(this.route.snapshot.paramMap.get('id'))
  )

  evalResource = this.evalService.evalAvecCritere(this.evaluation_id)
  
}
