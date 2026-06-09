import { inject, Injectable } from '@angular/core';
import { environment } from '../../environments/environment';
import { HttpClient } from '@angular/common/http';
import { InscriptionData } from '../models/auth/inscription';
import { Connexion } from '../models/auth/connexion';

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  private url: string = environment.authUrl;
  private httpClient: HttpClient = inject(HttpClient);
  public isAuthenticated = false;

  inscription(inscription: InscriptionData) {
    return this.httpClient.post(`${this.url}/register`, inscription);
  }

  connexion(connexion: Connexion) {
    return this.httpClient.post(`${this.url}/login`, connexion);
  }

  recupererToken() {
    return this.httpClient.get(`${this.url}/sanctum/csrf-cookie`);
  }
  
}
