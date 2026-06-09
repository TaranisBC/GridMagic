import { Critere } from "./critere";
import { Etudiant } from "./etudiant";
import { Niveau } from "./niveau";

export interface EvalComplete {
    id: number,
    titre: string,
    description: string,
    points_total: number,
    ponderation: number,
    cours_id: number,
    criteres: Critere[]
    etudiants: Etudiant[]
}