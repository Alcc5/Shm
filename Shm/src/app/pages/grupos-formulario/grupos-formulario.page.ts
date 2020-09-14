import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Grupo } from '../grupos/grupo';
import { DefinicaoSeguranca } from '../grupos/definicaoSeguranca';
import { AlertController } from '@ionic/angular';
import { Router } from '@angular/router';

@Component({
  selector: 'app-grupos-formulario',
  templateUrl: './grupos-formulario.page.html',
  styleUrls: ['./grupos-formulario.page.scss'],
})
export class GruposFormularioPage implements OnInit {
  idGrupo = "0";
  defaultHref = '/grupos';
  grupo: Grupo = {id:0, nome: '', seguranca: [], flDev: 0, flAtivo: 0, segurancaStr: ''};

  seguranca: DefinicaoSeguranca[] = [];

constructor(private route: ActivatedRoute, private httpClient: HttpClient, public alertController: AlertController, private router: Router) { }

  ngOnInit() {
    //alert('teste');
  }

  ionViewDidEnter() {
   // alert('teste');
    this.grupo = {id:0, nome: '', seguranca: [], flDev: 0, flAtivo: 0, segurancaStr: ''};

    this.idGrupo=this.route.snapshot.paramMap.get('id');

    this.seguranca.push({id:'g1', software: 'Geral', nome: 'Gerenciar Grupos e Usuários', flLigado: 0, grupo: 'Seguranca'});

    this.seguranca.push({id:'p1', software: 'Perroquet', nome: 'Acesso ao Software', flLigado: 0, grupo: 'Acesso'});

    this.seguranca.push({id:'p2', software: 'Perroquet', nome: 'Visualizar Contatos', flLigado: 0, grupo: 'Contatos'});
    this.seguranca.push({id:'p3', software: 'Perroquet', nome: 'Editar e Cadastrat Contatos', flLigado: 0, grupo: 'Contatos'});
    this.seguranca.push({id:'p4', software: 'Perroquet', nome: 'Importar Contatos', flLigado: 0, grupo: 'Contatos'});
    this.seguranca.push({id:'p5', software: 'Perroquet', nome: 'Editar Formulário de Contatos', flLigado: 0, grupo: 'Contatos'});

    this.seguranca.push({id:'p6', software: 'Perroquet', nome: 'Visualizar Campanhas', flLigado: 0, grupo: 'Campanhas'});
    this.seguranca.push({id:'p7', software: 'Perroquet', nome: 'Pausar/Despausar/Cancelar Campanhas', flLigado: 0, grupo: 'Campanhas'});
    this.seguranca.push({id:'p8', software: 'Perroquet', nome: 'Criar Campanhas', flLigado: 0, grupo: 'Campanhas'});

    this.seguranca.push({id:'p9', software: 'Perroquet', nome: 'Disparos Unitários', flLigado: 0, grupo: 'Disparo Unitário'});

    this.seguranca.push({id:'p10', software: 'Perroquet', nome: 'Gestão das Linhas', flLigado: 0, grupo: 'Linhas'});

/*  this.seguranca.push({id:'a1', software: 'Automato', nome: 'Acesso ao Software', flLigado: 0, grupo: 'Acesso'});

    this.seguranca.push({id:'a2', software: 'Automato', nome: 'Visualizar Contatos', flLigado: 0, grupo: 'Contatos'});
    this.seguranca.push({id:'a3', software: 'Automato', nome: 'Editar e Cadastrat Contatos', flLigado: 0, grupo: 'Contatos'});
    this.seguranca.push({id:'a4', software: 'Automato', nome: 'Importar Contatos', flLigado: 0, grupo: 'Contatos'});
    this.seguranca.push({id:'a5', software: 'Automato', nome: 'Editar Formulário de Contatos', flLigado: 0, grupo: 'Contatos'});

    this.seguranca.push({id:'a6', software: 'Automato', nome: 'Gerir Tabelas', flLigado: 0, grupo: 'Tabelas'});

    this.seguranca.push({id:'a7', software: 'Automato', nome: 'Extrair Informações', flLigado: 0, grupo: 'Extrair'});

    this.seguranca.push({id:'a8', software: 'Automato', nome: 'Gerir Tarefas', flLigado: 0, grupo: 'Robô'});
    this.seguranca.push({id:'a9', software: 'Automato', nome: 'Gerir Integrações', flLigado: 0, grupo: 'Robô'});
    this.seguranca.push({id:'a10', software: 'Automato', nome: 'Agendar Tarefas', flLigado: 0, grupo: 'Robô'}); */

    

    if(this.idGrupo!="0"){
      const httpOptions = {
        headers: new HttpHeaders({ 
          'Accept' : 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'
      })}

      var urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
      urlBack = urlBack + 'Seguranca/Grupos.php?id=' + this.idGrupo + '&token=' + sessionStorage.getItem('token') + '&tokenUsuario=' + sessionStorage.getItem('usuario');
      this.httpClient.get<Grupo>(urlBack,httpOptions).subscribe((lista: Grupo) => {
        this.grupo = lista[0];

        var obj = JSON.parse(lista[0].segurancaStr);

        this.grupo.seguranca = obj;

        this.seguranca.forEach(seg1 => {
          this.grupo.seguranca.forEach(seg2 => {
                if(seg1.id == seg2.id){
                  seg1.flLigado = seg2.flLigado;
                }
            });
        });
        console.log(this.grupo);
      },error  => {
        if(error['error']['text'] == 'LOGIN'){
          document.getElementById('checkLogin').click();
        }
      });
    }
  }

  excluirSim(){
      const httpOptions = {
        headers: new HttpHeaders({ 
          'Accept' : 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'
      })}
      
      var urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
      urlBack = urlBack + 'Seguranca/ExcluirGrupo.php?check=' + this.idGrupo + '&token=' + sessionStorage.getItem('token') + '&tokenUsuario=' + sessionStorage.getItem('usuario');
      this.httpClient.get(urlBack,httpOptions).subscribe(async data => {
        if(data[0]['qtd']>0){
            const alert = await this.alertController.create({
              cssClass: 'my-custom-class',
              header: 'Não foi possível excluir o Grupo',
              message: 'Existem usuários atribuídos a esse grupo.',
              buttons: ['OK']
            });      
            await alert.present();
            return;
        }
        else{
          urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
          urlBack = urlBack + 'Seguranca/ExcluirGrupo.php?id=' + this.idGrupo;
          this.httpClient.get(urlBack,httpOptions).subscribe();
          this.router.navigate(['/grupos']);
        }
      },error  => {
        if(error['error']['text'] == 'LOGIN'){
          document.getElementById('checkLogin').click();
        }
      });
  }

  async excluir(){
    const alert = await this.alertController.create({
      cssClass: 'my-custom-class',
      header: 'Deseja realmente excluir o grupo?',
      message: 'Excluir Grupo?',
      buttons: [
        {
          text: 'Não',
          role: 'cancel'
        },
        {
          text: 'Sim',
          handler: () => {
            this.excluirSim();
          }
        }
      ]
    });      
    await alert.present();
    return;
  }

  async salvar(){

    if((<HTMLInputElement>document.getElementById('Nome')).value.toString().trim() == ''){
      const alert = await this.alertController.create({
        cssClass: 'my-custom-class',
        header: 'Não foi possível salvar o Grupo',
        message: 'Informe o nome do Grupo.',
        buttons: ['OK']
      });      
      await alert.present();
      return;
    }
    else{
      this.grupo.nome = (<HTMLInputElement>document.getElementById('Nome')).value.toString().trim();
    }

    if((<HTMLInputElement>document.getElementById('Ativo')).checked){
      this.grupo.flAtivo = 1;
    }
    else{
      this.grupo.flAtivo = 0;
    }

    this.seguranca.forEach(seg => {
      if((<HTMLInputElement>document.getElementById('seg' + seg.id)).checked){
        seg.flLigado = 1;
      }
      else{
        seg.flLigado = 0;
      }
    });
    this.grupo.seguranca = this.seguranca;

    const httpOptions = {
      headers: new HttpHeaders({ 
        'Accept' : 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'
    })}
    
    var urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
    urlBack = urlBack + 'Seguranca/NovoGrupo.php?token=' + sessionStorage.getItem('token') + '&tokenUsuario=' + sessionStorage.getItem('usuario');
    this.httpClient.post(urlBack,this.grupo,httpOptions).subscribe(data => {
      console.log(data['_body']);
     },error  => {
      if(error['error']['text'] == 'LOGIN'){
        document.getElementById('checkLogin').click();
      }
    });

    this.router.navigate(['/grupos']);
    
  }

}
