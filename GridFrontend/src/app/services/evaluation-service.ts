import { inject, Injectable, Signal } from '@angular/core';
import { environment } from '../../environments/environment';
import { HttpClient, httpResource } from '@angular/common/http';
import { Evaluation } from '../models/evaluation';
import { ApiResponse } from '../models/utils/ApiResponce';
import { EvalComplete } from '../models/eval_complete';

@Injectable({
  providedIn: 'root',
})
export class EvaluationService {
  private url = environment.apiUrl;
  private httpClient = inject(HttpClient)

  creerEval(evaluation: Partial<Evaluation>) {
    return this.httpClient.post<ApiResponse<Evaluation>>(`${this.url}/evaluation`, evaluation);
  }

  modifierEval(id: number, evaluation: Partial<Evaluation>) {
    return this.httpClient.put(`${this.url}/evaluation/${id}`, evaluation)
  }

  supprimerEval(id: number) {
    return this.httpClient.delete(`${this.url}/evaluation/${id}`)
  }

  evalAvecCritere(id: Signal<number | null>) {
    return httpResource<ApiResponse<EvalComplete>>(
      () => id() ? `${this.url}/evaluation/${id()}` : undefined
    );
  }
}
