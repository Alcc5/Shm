import { DefinicaoSeguranca } from './definicaoSeguranca';

export interface Grupo {
    id: number;
    nome: string;
    seguranca: DefinicaoSeguranca[];
    flDev: number;
    flAtivo: number;
    segurancaStr: string;
  }


  