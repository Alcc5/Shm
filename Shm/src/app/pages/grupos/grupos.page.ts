import { Component, OnInit } from '@angular/core';
import { HttpHeaders, HttpClient } from '@angular/common/http';
import { Grupo } from './grupo';
import { Router } from '@angular/router';
import { ModalController, IonRouterOutlet, Config } from '@ionic/angular';

import { GruposFiltrosPage } from '../grupos-filtros/grupos-filtros.page';




@Component({
  selector: 'app-grupos',
  templateUrl: './grupos.page.html',
  styleUrls: ['./grupos.page.scss'],
})
export class GruposPage implements OnInit {
  showSearchbar: boolean;
  ios: boolean;

  grupos: Grupo[] = [];
  id: any;

  filtroNomeGrupo: string = '';

  constructor(
    private httpClient: HttpClient, 
    private router: Router, 
    public modalCtrl: ModalController,
    public routerOutlet: IonRouterOutlet, public config: Config) { }

    excludeTracks: any = [];

  async filtros(){

    const modal = await this.modalCtrl.create(      
      {
      component: GruposFiltrosPage,
      swipeToClose: true,
      presentingElement: this.routerOutlet.nativeEl,
      componentProps: { excludedTracks: this.excludeTracks }
    });
    await modal.present();

    const { data } = await modal.onWillDismiss();
    if (data) {
      if(data=='N/D'){
        this.filtroNomeGrupo = '';
      }
      else{
        this.filtroNomeGrupo = data;
      }
      this.observerGrupo();
    }
  }

  observerGrupo(){
    const httpOptions = {
      headers: new HttpHeaders({ 
        'Accept' : 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'
    })}

    var urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
    urlBack = urlBack + 'Seguranca/Grupos.php?nome=' + this.filtroNomeGrupo + '&token=' + sessionStorage.getItem('token') + '&tokenUsuario=' + sessionStorage.getItem('usuario');
    this.httpClient.get<Grupo[]>(urlBack,httpOptions).subscribe((lista: Grupo[]) => {
      this.grupos = lista;   
    },error  => {
      if(error['error']['text'] == 'LOGIN'){
        document.getElementById('checkLogin').click();
      }
    }
    );
  }

  nova(){
    this.router.navigate(['/grupos/grupos-formulario/0']);
  }

  ionViewDidEnter() { 
    this.observerGrupo();
    this.id = setInterval(() => {
      this.observerGrupo(); 
    }, 5000);
  }
  
  ionViewWillLeave(){
    if (this.id) {
      clearInterval(this.id);
    }
  }

  ngOnInit() {
    this.ios = this.config.get('mode') === 'ios';
  }

}
