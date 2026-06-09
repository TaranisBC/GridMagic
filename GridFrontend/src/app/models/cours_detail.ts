import { Etudiant } from "./etudiant";
import { Evaluation } from "./evaluation";

export interface CoursDetail {
    id: number,
    titre: string,
    code: string,
    description: string,
    semestre: string,
    archive: boolean,
    etudiants: Etudiant[],
    evaluations: Evaluation[]
}