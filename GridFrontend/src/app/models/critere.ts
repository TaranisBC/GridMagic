import { Niveau } from "./niveau"

export interface Critere {
  id: number
  evaluation_id: number
  titre: string
  description: string
  ordre: number
  niveaux: Niveau[]
}