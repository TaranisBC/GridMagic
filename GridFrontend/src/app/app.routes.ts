import { Routes } from '@angular/router';
import { Inscription } from './components/auth/inscription/inscription';
import { Connexion } from './components/auth/connexion/connexion';
import { CoursHomeComponent } from './components/cours/cours-home-component/cours-home-component';
import { CoursDetailsComponent } from './components/cours/cours-details-component/cours-details-component';
import { EvaluationHome } from './components/evaluations/evaluation-home/evaluation-home';

export const routes: Routes = [
    {
        path: 'inscription',
        component: Inscription
    },
    {
        path: 'connexion',
        component: Connexion
    },
    {
        path: 'cours',
        component: CoursHomeComponent
    },
    {
        path: 'cours/:id',
        component: CoursDetailsComponent
    },
    {
        path: 'evaluation/:id',
        component: EvaluationHome
    }
];
