import { inject, Injectable } from '@angular/core';
import { Critere } from '../models/critere';
import { HttpClient } from '@angular/common/http';
import { environment } from '../../environments/environment';

@Injectable({
  providedIn: 'root',
})
export class CritereService {
  modifierCritere(id: number, payload: Omit<Critere, "id">) {
    return this.httpClient.put(`${this.url}/criteres/${id}`, payload)
  }

  private url = environment.apiUrl;
  private httpClient = inject(HttpClient)

  creerCritere(payload: Omit<Critere, "id">) {
    return this.httpClient.post(`${this.url}/criteres`, payload)
  }
}
