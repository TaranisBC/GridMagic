import { Component, inject, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, FormsModule, ReactiveFormsModule, Validators } from '@angular/forms';
import { AuthService } from '../../../services/auth-service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-connexion',
  imports: [
    FormsModule,
    ReactiveFormsModule
  ],
  templateUrl: './connexion.html',
  styleUrl: './connexion.css',
})
export class Connexion implements OnInit {
  private formBuilder: FormBuilder = inject(FormBuilder)
  private authService: AuthService = inject(AuthService)
  private router: Router = inject(Router)
  formConnexion!: FormGroup

  ngOnInit(): void {
    this.formConnexion = this.formBuilder.group({      
      email: ['', [Validators.required, Validators.email]],
      password: ['', Validators.required],      
    })
  }

  login(event: Event) {
    event.preventDefault
    this.authService.recupererToken().subscribe({
      next: () => {
        this.authService.connexion(this.formConnexion.value).subscribe({
          next: (response) => {
            console.log("Connexion réussie")
          }
        })
      }
    })
  }

}
