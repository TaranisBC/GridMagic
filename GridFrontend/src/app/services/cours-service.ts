import { inject, Injectable, Signal } from '@angular/core';
import { environment } from '../../environments/environment';
import { HttpClient, httpResource } from '@angular/common/http';
import { ApiResponse } from '../models/utils/ApiResponce';
import { Cours } from '../models/cours';
import { CoursDetail } from '../models/cours_detail';
import { Etudiant } from '../models/etudiant';

@Injectable({
  providedIn: 'root',
})
export class CoursService {
  private url = environment.apiUrl;
  private httpClient = inject(HttpClient)


  cours = httpResource<ApiResponse<Cours[]>>(
    () => `${this.url}/cours`
  )

  coursParId(id: Signal<number | null>) {
    return httpResource<ApiResponse<CoursDetail>>(
      () => id() ? `${this.url}/cours/${id()}` : undefined
    );
  }

  creerCours(cours: Partial<Cours>) {
    return this.httpClient.post<ApiResponse<Cours>>(`${this.url}/cours`, cours);
  }

  supprimerCours(id: number) {
    return this.httpClient.delete(`${this.url}/cours/${id}`);
  }

  archiverCours(id: number) {
    return this.httpClient.patch(`${this.url}/cours/${id}/archiver`, {});
  }

  restaurerCours(id: number) {
    return this.httpClient.patch(`${this.url}/cours/${id}/restaurer`, {});
  }

  retirerEtudiant(cours_id: number, etudiant_id: string) {
    return this.httpClient.delete(`${this.url}/cours/${cours_id}/etudiants/${etudiant_id}`)
  }

  ajouterEtudiant(cours_id: number, etudiant: Etudiant) {
    return this.httpClient.post(`${this.url}/cours/${cours_id}/ajouter-etudiant`, etudiant)
  }

  importerEtudiants(coursId: number, fichier: File) {
    const formData = new FormData()
    formData.append('fichier', fichier)
    return this.httpClient.post<{importes: number, erreurs: any[]}>(
      `${this.url}/cours/${coursId}/etudiants/import`,formData
    )
  }
}
