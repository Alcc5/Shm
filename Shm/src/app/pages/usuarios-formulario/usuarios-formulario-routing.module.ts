import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { UsuariosFormularioPage } from './usuarios-formulario.page';

const routes: Routes = [
  {
    path: '',
    component: UsuariosFormularioPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class UsuariosFormularioPageRoutingModule {}
