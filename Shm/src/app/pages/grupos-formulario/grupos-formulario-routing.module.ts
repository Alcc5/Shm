import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { GruposFormularioPage } from './grupos-formulario.page';

const routes: Routes = [
  {
    path: '',
    component: GruposFormularioPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class GruposFormularioPageRoutingModule {}
