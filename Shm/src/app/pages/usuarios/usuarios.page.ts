import { Component, OnInit } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Usuario } from './usuarios';
import { Router } from '@angular/router';
import { ModalController, IonRouterOutlet, Config } from '@ionic/angular';

import { UsuariosFiltrosPage } from '../usuarios-filtros/usuarios-filtros.page';

@Component({
  selector: 'app-usuarios',
  templateUrl: './usuarios.page.html',
  styleUrls: ['./usuarios.page.scss'],
})
export class UsuariosPage implements OnInit {
  showSearchbar: boolean;
  ios: boolean;

  constructor(
    private httpClient: HttpClient, 
    private router: Router, 
    public modalCtrl: ModalController,
    public routerOutlet: IonRouterOutlet,
    public config: Config) { }

    excludeTracks: any = [];

  filtroNome: string = '';
  filtroEmail: string = '';
  filtroGrupo: string = '';

  id: any;

  usuarios: Usuario[];

  ngOnInit() {
    this.ios = this.config.get('mode') === 'ios';
  }

  async filtros(){

    const modal = await this.modalCtrl.create(      
      {
      component: UsuariosFiltrosPage,
      swipeToClose: true,
      presentingElement: this.routerOutlet.nativeEl,
      componentProps: { excludedTracks: this.excludeTracks }
    });
    await modal.present();

    const { data } = await modal.onWillDismiss();
    if (data) {
      this.filtroNome = data[0];
      this.filtroEmail = data[1];
      this.filtroGrupo = data[2];
      this.observerUsuario();
    }
  }

  observerUsuario(){
    const httpOptions = {
      headers: new HttpHeaders({ 
        'Accept' : 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'
    })}

    var urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
    urlBack = urlBack + 'Seguranca/Usuarios.php?nome=' + this.filtroNome + '&email=' + this.filtroEmail  + '&grupo=' + this.filtroGrupo + '&token=' + sessionStorage.getItem('token') + '&tokenUsuario=' + sessionStorage.getItem('usuario');
    this.httpClient.get<Usuario[]>(urlBack,httpOptions).subscribe((lista: Usuario[]) => {
      this.usuarios = lista;      
    },error  => {
      if(error['error']['text'] == 'LOGIN'){
        document.getElementById('checkLogin').click();
      }
    });
  }

  ionViewDidEnter() { 
    this.observerUsuario();
    this.id = setInterval(() => {
      this.observerUsuario(); 
    }, 5000);
  }
  
  ionViewWillLeave(){
    if (this.id) {
      clearInterval(this.id);
    }
  }

}
