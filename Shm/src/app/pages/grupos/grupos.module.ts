import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { GruposPageRoutingModule } from './grupos-routing.module';

import { GruposPage } from './grupos.page';

import { GruposFiltrosPage } from '../grupos-filtros/grupos-filtros.page';


@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    GruposPageRoutingModule
  ],
  declarations: [GruposPage,GruposFiltrosPage],
  entryComponents: [
    GruposFiltrosPage
  ]
})
export class GruposPageModule {}

