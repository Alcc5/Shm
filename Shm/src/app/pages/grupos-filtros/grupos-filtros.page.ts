import { Component, OnInit } from '@angular/core';
import { NavController, ModalController } from '@ionic/angular';

@Component({
  selector: 'app-grupos-filtros',
  templateUrl: './grupos-filtros.page.html',
  styleUrls: ['./grupos-filtros.page.scss'],
})
export class GruposFiltrosPage implements OnInit {

  constructor(private nav:NavController,private modalCtrl:ModalController) {}

  ngOnInit() {
  }

  closeModal()
  {
    this.modalCtrl.dismiss();
  }

  pesquisar()
  {
    if((<HTMLInputElement>document.getElementById('FiltroNome')).value.toString().trim()==''){
      this.modalCtrl.dismiss('N/D');
    }
    else{
      this.modalCtrl.dismiss((<HTMLInputElement>document.getElementById('FiltroNome')).value.toString().trim());
    }
  }

}
