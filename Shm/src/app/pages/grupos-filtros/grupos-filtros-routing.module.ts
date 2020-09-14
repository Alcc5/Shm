import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { GruposFiltrosPage } from './grupos-filtros.page';

const routes: Routes = [
  {
    path: '',
    component: GruposFiltrosPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class GruposFiltrosPageRoutingModule {}
