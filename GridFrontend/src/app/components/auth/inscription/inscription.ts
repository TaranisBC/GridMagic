import { Component, inject, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../../../services/auth-service';

@Component({
  selector: 'app-inscription',
  imports: [    
    ReactiveFormsModule
  ],
  templateUrl: './inscription.html',
  styleUrl: './inscription.css',
})
export class Inscription {
  
  private formBuilder: FormBuilder = inject(FormBuilder)
  private authService: AuthService = inject(AuthService)
  private router: Router = inject(Router)

  formInscription = this.formBuilder.nonNullable.group({
      name: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      password: ['', Validators.required],
      password_confirmation: ['', Validators.required],
    })


  creerUser(event: Event) {
    event.preventDefault()
    if(this.formInscription.invalid) return

    this.authService.recupererToken().subscribe({
      next: () => {
        this.authService.inscription(this.formInscription.getRawValue()).subscribe({
          next: (response) => {
            console.log("Inscription probablement réussie ...")
          }
        })
      }
    })
  }
}
