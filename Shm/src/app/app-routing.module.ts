import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CheckTutorial } from './providers/check-tutorial.service';

const routes: Routes = [
  {
    path: '',
    redirectTo: '/tutorial',
    pathMatch: 'full'
  },

  {
    path: 'login',
    loadChildren: () => import('./pages/login/login.module').then(m => m.LoginModule)
  },
  {
    path: 'usuarios',
    loadChildren: () => import('./pages/usuarios/usuarios.module').then(m => m.UsuariosPageModule)
  },
  {
    path: 'usuarios/usuarios-formulario/:id',
    loadChildren: () => import('./pages/usuarios-formulario//usuarios-formulario.module').then(m => m.UsuariosFormularioPageModule)
  }
  ,
  {
    path: 'grupos',
    loadChildren: () => import('./pages/grupos/grupos.module').then(m => m.GruposPageModule)
  }
  ,
  {
    path: 'grupos/grupos-formulario/:id',
    loadChildren: () => import('./pages/grupos-formulario/grupos-formulario.module').then(m => m.GruposFormularioPageModule)
  }
  ,


];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
