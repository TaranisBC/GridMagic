import { Component, computed, effect, inject, input, output, signal } from '@angular/core';
import { Critere } from '../../../models/critere';
import { Resultat } from '../../../models/resultat';
import { ResultatService } from '../../../services/resultat-service';
import { NgPlural } from "@angular/common";

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
  pointsAjustes = signal<number | null>(null)

  resultatsaved = output<Resultat>()

  private resultatsService = inject(ResultatService)

  niveauChoisi  = signal<number | null>(null)
  commentaire   = signal<string>('')

  pourcentage = computed(() => {
    if (this.niveauChoisi() === null || this.pointsAjustes() === null) return null
    return (this.pointsAjustes()! / this.critere().niveaux[0].points) * 100
  })


  constructor() {
    effect(() => {
      const res = this.resultat()
      if (res) {
        this.niveauChoisi.set(res.niveau_index)
        this.commentaire.set(res.commentaire ?? '')
        this.pointsAjustes.set(res.points_obtenus)
      } else {
        this.niveauChoisi.set(null)
        this.commentaire.set('')
        this.pointsAjustes.set(null)
      }
    })
  }

  choisirNiveau(index: number) {
    this.niveauChoisi.set(index)
    this.pointsAjustes.set(this.critere().niveaux[index].points)
    this.sauvegarder()
  }

  sauvegarder() {
    if (this.niveauChoisi() === null) return

    const payload: Omit<Resultat,'id'> = {
      no_etudiant:    this.etudiantId(),
      critere_id:     this.critere().id,
      niveau_index:   this.niveauChoisi()!,
      points_obtenus: this.pointsAjustes() ?? this.critere().niveaux[this.niveauChoisi()!].points,
      commentaire:    this.commentaire(),
    }

    this.resultatsService.sauvegarder(payload).subscribe({
      next: (res: any) => {        
        this.resultatsaved.emit(res.data!)
      },
      error: (err: Error) => {        
        console.error(err)
      }
    })
  }

}
