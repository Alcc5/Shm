import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { UsuariosPageRoutingModule } from './usuarios-routing.module';

import { UsuariosPage } from './usuarios.page';

import { UsuariosFiltrosPage } from '../usuarios-filtros/usuarios-filtros.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    UsuariosPageRoutingModule
  ],
  declarations: [UsuariosPage,UsuariosFiltrosPage],
  entryComponents: [
    UsuariosFiltrosPage
  ]
})
export class UsuariosPageModule {}
