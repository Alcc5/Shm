import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { UsuariosFiltrosPage } from './usuarios-filtros.page';

const routes: Routes = [
  {
    path: '',
    component: UsuariosFiltrosPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class UsuariosFiltrosPageRoutingModule {}
