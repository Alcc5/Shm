import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { UsuariosFormularioPageRoutingModule } from './usuarios-formulario-routing.module';

import { UsuariosFormularioPage } from './usuarios-formulario.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    UsuariosFormularioPageRoutingModule
  ],
  declarations: [UsuariosFormularioPage]
})
export class UsuariosFormularioPageModule {}
