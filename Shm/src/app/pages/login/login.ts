import { Component } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';

import { UserData } from '../../providers/user-data';

import { UserOptions } from '../../interfaces/user-options';

import { MenuController, AlertController } from '@ionic/angular';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { AppComponent } from '../../app.component';
import { Usuario } from '../usuarios/usuarios';

@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
  styleUrls: ['./login.scss'],
})
export class LoginPage {
  login: UserOptions = { username: '', password: '' };
  submitted = false;

  constructor(
    public userData: UserData,
    public router: Router,
    public menu: MenuController,
    private httpClient: HttpClient, 
    public alertController: AlertController
  ) { }

  async logar(){
      if((<HTMLInputElement>document.getElementById('usuario')).value.toString().trim() == ''){
        const alert = await this.alertController.create({
          cssClass: 'my-custom-class',
          header: 'Falha no Login',
          message: 'Informe o Email do Usuário.',
          buttons: ['OK']
        });      
        await alert.present();
        return;
      }
      if((<HTMLInputElement>document.getElementById('senha')).value.toString().trim() == ''){
        const alert = await this.alertController.create({
          cssClass: 'my-custom-class',
          header: 'Falha no Login',
          message: 'Informe a Senha do Usuário.',
          buttons: ['OK']
        });      
        await alert.present();
        return;
      }

      const httpOptions = {
        headers: new HttpHeaders({ 
          'Accept' : 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'
      })}
      
      var urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
      urlBack = urlBack + 'Seguranca/Logado.php?usuario=' + btoa((<HTMLInputElement>document.getElementById('usuario')).value.toString().trim()) + '&senha=' + btoa((<HTMLInputElement>document.getElementById('senha')).value.toString().trim());
      this.httpClient.get<string>(urlBack,httpOptions).subscribe(async (lista: string) => {
        this.tratarLogin(lista);
      },error  => {
        this.tratarLogin(error['error']['text']);
      });
  }

  async tratarLogin(lista: string){
    if(lista.indexOf('TOKEN|') != -1){
      //alert(lista);
      var token = lista.split('|')[1];
      var nome = lista.split('|')[2];
      //alert(token);
      sessionStorage.setItem('token', token);
      sessionStorage.setItem('usuario', btoa((<HTMLInputElement>document.getElementById('usuario')).value.toString().trim()));
      //sessionStorage.setItem('senha', btoa((<HTMLInputElement>document.getElementById('senha')).value.toString().trim()));
      sessionStorage.setItem('nome', nome);

      document.getElementById('checkLogin').click();

      this.router.navigate(['/instancias']);
    }   
    else if(lista == 'BLOQUEADO'){
      const alert = await this.alertController.create({
        cssClass: 'my-custom-class',
        header: 'Falha no Login',
        message: 'Usuário bloqueado.',
        buttons: ['OK']
      });
      await alert.present();
      return;
    }
    else{
        const alert = await this.alertController.create({
          cssClass: 'my-custom-class',
          header: 'Falha no Login',
          message: 'Usuário ou senha inválidos.',
          buttons: ['OK']
        });      
      await alert.present();
      return;
    }   
  }
  
  onLogin(form: NgForm) {
    this.submitted = true;

    if (form.valid) {
      this.userData.login(this.login.username);
      this.router.navigateByUrl('/app/tabs/schedule');
    }
  }

  onSignup() {
    this.router.navigateByUrl('/signup');
  }

  ionViewWillEnter() {
    const httpOptions = {
      headers: new HttpHeaders({ 
        'Accept' : 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'
    })}
    
    var urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
    urlBack = urlBack + 'Seguranca/Logado.php?token=' + sessionStorage.getItem('token') + '&tokenUsuario=' + sessionStorage.getItem('usuario');
    this.httpClient.get<Usuario[]>(urlBack,httpOptions).subscribe((lista: Usuario[]) => {
      this.router.navigateByUrl('/instancias');
    },error  => {
      if(error['error']['text'] == 'LOGIN'){
        document.getElementById('checkLogin').click();
      }
    });
  }

  ionViewDidLeave() {
    // enable the root left menu when leaving the tutorial page
   // this.menu.enable(true);
  }
}
