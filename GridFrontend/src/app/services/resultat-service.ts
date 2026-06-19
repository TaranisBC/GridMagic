import { inject, Injectable } from '@angular/core';
import { Resultat } from '../models/resultat';
import { HttpClient } from '@angular/common/http';
import { environment } from '../../environments/environment';
import { ApiResponse } from '../models/utils/ApiResponce';

@Injectable({
  providedIn: 'root',
})
export class ResultatService {

  private url = environment.apiUrl;
  private httpClient = inject(HttpClient)


  getResultatEtuEval(no_etudiant: String, evaluation_id: number) {
    
  }

  sauvegarder(payload: Omit<Resultat, 'id'>) {
    return this.httpClient.post<ApiResponse<Resultat>>(`${this.url}/resultats`, payload)
  }
}
