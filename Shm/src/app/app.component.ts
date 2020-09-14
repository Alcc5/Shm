import { Component, OnInit, ViewEncapsulation } from '@angular/core';
import { Router } from '@angular/router';
import { SwUpdate } from '@angular/service-worker';

import { MenuController, Platform, ToastController } from '@ionic/angular';

import { SplashScreen } from '@ionic-native/splash-screen/ngx';
import { StatusBar } from '@ionic-native/status-bar/ngx';

import { Storage } from '@ionic/storage';

import { UserData } from './providers/user-data';
import { Usuario } from './pages/usuarios/usuarios';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
  encapsulation: ViewEncapsulation.None
})
export class AppComponent implements OnInit {

  nomeLogado:string='';

  appPages = [
    {
      title: 'Schedule',
      url: '/app/tabs/schedule',
      icon: 'calendar'
    },
    {
      title: 'Speakers',
      url: '/app/tabs/speakers',
      icon: 'people'
    },
    {
      title: 'Map',
      url: '/app/tabs/map',
      icon: 'map'
    },
    {
      title: 'About',
      url: '/app/tabs/about',
      icon: 'information-circle'
    }
  ];
  loggedIn = false;
  dark = false;
  menuLigado = true;
  txtIconMenu = "arrow-undo-outline";

  constructor(
    private httpClient: HttpClient,  
    private menu: MenuController,
    private platform: Platform,
    private router: Router,
    private splashScreen: SplashScreen,
    private statusBar: StatusBar,
    private storage: Storage,
    private userData: UserData,
    private swUpdate: SwUpdate,
    private toastCtrl: ToastController,
  ) {
    this.initializeApp();
  }

  async ngOnInit() {
    this.checkLoginStatus();
    this.listenForLoginEvents();

    this.swUpdate.available.subscribe(async res => {
      const toast = await this.toastCtrl.create({
        message: 'Update available!',
        position: 'bottom',
        buttons: [
          {
            role: 'cancel',
            text: 'Reload'
          }
        ]
      });

      await toast.present();

      toast
        .onDidDismiss()
        .then(() => this.swUpdate.activateUpdate())
        .then(() => window.location.reload());
    });
  }

  initializeApp() {
    this.platform.ready().then(() => {
      this.statusBar.styleDefault();
      this.splashScreen.hide();
    });

    this.checkLogin();
    //setInterval(() => {
    //  this.checkLogin(); 
    //}, 30000);
  }

  checkLoginStatus() {
    return this.userData.isLoggedIn().then(loggedIn => {
      return this.updateLoggedInStatus(loggedIn);
    });
  }

  updateLoggedInStatus(loggedIn: boolean) {
    setTimeout(() => {
      this.loggedIn = loggedIn;
    }, 300);
  }

  public checkLogin(){
   // alert('teste');
    const httpOptions = {
      headers: new HttpHeaders({ 
        'Accept' : 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'
    })}
    
    var urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
    urlBack = urlBack + 'Seguranca/Logado.php?token=' + sessionStorage.getItem('token') + '&tokenUsuario=' + sessionStorage.getItem('usuario');
    this.httpClient.get<Usuario[]>(urlBack,httpOptions).subscribe((lista: Usuario[]) => {
      this.nomeLogado = lista[0].nome;     
      document.getElementById('btnMenuHide').style.display='';
      if(this.menuLigado){
        this.menu.enable(true);
      }
      document.getElementById('btnMenuHide').style.display='';
    },error  => {
      if(error['error']['text'] == 'LOGIN'){
        this.router.navigate(['/login']);
        document.getElementById('btnMenuHide').style.display='none';
        this.menu.enable(false);
      }
    });
  }

  sair(){
      sessionStorage.setItem('token', null);
      sessionStorage.setItem('usuario', null);
      sessionStorage.setItem('senha', null);
      sessionStorage.setItem('nome', null);

      this.nomeLogado = '';

      this.checkLogin();
  }

  hideMenu(){
    //alert(this.menu.isOpen);
    if(this.menuLigado){
      this.menu.enable(false);
      this.menuLigado = false;
      this.txtIconMenu = "arrow-redo-outline";
    }
    else{
      this.menu.enable(true);
      this.menuLigado = true;
      this.txtIconMenu = "arrow-undo-outline";
    }
    
  }

  listenForLoginEvents() {
    window.addEventListener('user:login', () => {
      this.updateLoggedInStatus(true);
    });

    window.addEventListener('user:signup', () => {
      this.updateLoggedInStatus(true);
    });

    window.addEventListener('user:logout', () => {
      this.updateLoggedInStatus(false);
    });
  }

  logout() {
    this.userData.logout().then(() => {
      return this.router.navigateByUrl('/app/tabs/schedule');
    });
  }

  openTutorial() {
    this.menu.enable(false);
    this.storage.set('ion_did_tutorial', false);
    this.router.navigateByUrl('/tutorial');
  }
}
