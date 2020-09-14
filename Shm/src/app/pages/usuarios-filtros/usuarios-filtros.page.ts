import { Component, OnInit } from '@angular/core';
import { NavController, ModalController } from '@ionic/angular';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Grupo } from '../grupos/grupo';

@Component({
  selector: 'app-usuarios-filtros',
  templateUrl: './usuarios-filtros.page.html',
  styleUrls: ['./usuarios-filtros.page.scss'],
})
export class UsuariosFiltrosPage implements OnInit {

  constructor(private nav:NavController,private modalCtrl:ModalController, private httpClient: HttpClient) {}

  grupos: Grupo[];

  ngOnInit() {
  }

  closeModal()
  {
    this.modalCtrl.dismiss();
  }

  pesquisar()
  {
    var filtros: string[] = [];
    
    filtros.push((<HTMLInputElement>document.getElementById('FiltroNome')).value.toString().trim());
    filtros.push((<HTMLInputElement>document.getElementById('FiltroEmail')).value.toString().trim());
    filtros.push((<HTMLInputElement>document.getElementById('FiltroGrupo')).value.toString().trim());

    this.modalCtrl.dismiss(filtros);    
  }



  ionViewDidEnter() { 
    const httpOptions = {
      headers: new HttpHeaders({ 
        'Accept' : 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'
    })}

    var urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
    urlBack = urlBack + 'Seguranca/Grupos.php?token=' + sessionStorage.getItem('token') + '&tokenUsuario=' + sessionStorage.getItem('usuario');
    this.httpClient.get<Grupo[]>(urlBack,httpOptions).subscribe((lista: Grupo[]) => {
      this.grupos = lista;      
    },error  => {
      if(error['error']['text'] == 'LOGIN'){
        document.getElementById('checkLogin').click();
      }
    });
  }

}
