import { inject, Injectable, Signal } from '@angular/core';
import { environment } from '../../environments/environment';
import { HttpClient, httpResource } from '@angular/common/http';
import { ApiResponse } from '../models/utils/ApiResponce';
import { Commentaire } from '../models/commentaire';
import { CorrectionGenerale } from '../models/correction-generale';

@Injectable({
  providedIn: 'root',
})
export class CommentaireService {

  private url = environment.apiUrl;
  private httpClient = inject(HttpClient)

  getCommentaireGeneral(evaluationId: Signal<number>, noEtudiant: Signal<string>) {
    return httpResource<ApiResponse<CorrectionGenerale>>(
      () => `${this.url}/evaluations/${evaluationId()}/etudiants/${noEtudiant()}/commentaire`
    )
  }

  sauvegarder(payload: CorrectionGenerale) {
    return this.httpClient.post<ApiResponse<CorrectionGenerale>>(
      `${this.url}/commentaire-general`, payload
    )
  }

}
