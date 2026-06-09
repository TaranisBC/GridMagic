import { Component, EventEmitter, inject, input, Output, signal } from '@angular/core';
import { Cours } from '../../../models/cours';
import { RouterLink } from "@angular/router";
import { CoursService } from '../../../services/cours-service';
import { NgIconComponent, provideIcons, NgIcon } from '@ng-icons/core';
import { heroArrowPath } from '@ng-icons/heroicons/outline';
import { ModalConfirmation } from "../../utils/modal-confirmation/modal-confirmation";

@Component({
  selector: 'app-cours-carte',
  imports: [
    RouterLink,
    NgIconComponent,
    ModalConfirmation,
      NgIcon
],
   providers: [provideIcons({ heroArrowPath })],
  templateUrl: './cours-carte.html',
  styleUrl: './cours-carte.css',
})
export class CoursCarte {

  cours = input.required<Cours>();
  @Output() coursModif = new EventEmitter<void>();
  afficherModal = signal(false)
  afficherModalArchive = signal(false)

  private coursService: CoursService = inject(CoursService)


  actionArchiver() {
    this.afficherModalArchive.set(true)
  }

  onConfirmerArchive() {
    this.afficherModalArchive.set(false)
    if(this.cours().archive) {
      this.restaurerCours()
    }
    else {
      this.archiverCours()
    }
  }

  archiverCours() {
    this.coursService.archiverCours(this.cours().id).subscribe({
      next: () => {
        this.coursModif.emit();
      },
      error: (error) => {
        console.error(error)
      }
    })
  }

  restaurerCours() {
    this.coursService.restaurerCours(this.cours().id).subscribe({
      next: () => {
        this.coursModif.emit();
      },
      error: (error) => {
        console.error(error)
      }
    })
  }

  supprimerCours() {
    this.afficherModal.set(true)
  }

  onConfirmerSuppression() {
    this.afficherModal.set(false)
    this.coursService.supprimerCours(this.cours().id).subscribe({
      next: () => {
        this.coursModif.emit();
      },
      error: (error) => {
        console.error(error)
      }
    })
  }
}
