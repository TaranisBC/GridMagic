import { inject, Injectable, Signal } from '@angular/core';
import { Resultat } from '../models/resultat';
import { HttpClient, httpResource } from '@angular/common/http';
import { environment } from '../../environments/environment';
import { ApiResponse } from '../models/utils/ApiResponce';

@Injectable({
  providedIn: 'root',
})
export class ResultatService {

  private url = environment.apiUrl;
  private httpClient = inject(HttpClient)


  getResultatsEtuEval(evaluationId: Signal<number>, noEtudiant: Signal<string | null>) {
    return httpResource<ApiResponse<Resultat[]>>(
      () => noEtudiant() 
        ? `${this.url}/evaluations/${evaluationId()}/etudiants/${noEtudiant()}/resultats`
        : undefined
    )
  }

  sauvegarder(payload: Omit<Resultat, 'id'>) {
    return this.httpClient.post<ApiResponse<Resultat>>(`${this.url}/resultats`, payload)
  }
}
