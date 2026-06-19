import { Component, inject, input, output, signal } from '@angular/core';
import { Critere } from '../../../models/critere';
import { Resultat } from '../../../models/resultat';
import { ResultatService } from '../../../services/resultat-service';

@Component({
  selector: 'app-correction-critere',
  imports: [],
  templateUrl: './correction-critere.html',
  styleUrl: './correction-critere.css',
})
export class CorrectionCritere {
  critere    = input.required<Critere>()
  etudiantId = input.required<string>()
  resultat   = input<Resultat | null>(null) 

  resultatsaved = output<Resultat>()

  private resultatsService = inject(ResultatService)

  niveauChoisi  = signal<number | null>(null)
  commentaire   = signal<string>('')
  saving        = signal<boolean>(false)

  ngOnInit() {
    // Pré-remplir si déjà corrigé
    if (this.resultat()) {
      this.niveauChoisi.set(this.resultat()!.niveau_index)
      this.commentaire.set(this.resultat()!.commentaire ?? '')
    }
  }

  choisirNiveau(index: number) {
    this.niveauChoisi.set(index)
    this.sauvegarder()
  }

  sauvegarder() {
    if (this.niveauChoisi() === null) return
    this.saving.set(true)

    const payload: Omit<Resultat,'id'> = {
      no_etudiant:    this.etudiantId(),
      critere_id:     this.critere().id,
      niveau_index:   this.niveauChoisi()!,
      points_obtenus: this.critere().niveaux[this.niveauChoisi()!].points,
      commentaire:    this.commentaire(),
    }

    this.resultatsService.sauvegarder(payload).subscribe({
      next: (res: any) => {
        this.saving.set(false)
        this.resultatsaved.emit(res.data!)
      },
      error: (err: Error) => {
        this.saving.set(false)
        console.error(err)
      }
    })
  }

}
