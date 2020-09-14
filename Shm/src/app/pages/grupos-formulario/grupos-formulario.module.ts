import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { GruposFormularioPageRoutingModule } from './grupos-formulario-routing.module';

import { GruposFormularioPage } from './grupos-formulario.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    GruposFormularioPageRoutingModule
  ],
  declarations: [GruposFormularioPage]
})
export class GruposFormularioPageModule {}
