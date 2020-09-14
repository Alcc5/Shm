import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { UsuariosFormularioPage } from './usuarios-formulario.page';

describe('UsuariosFormularioPage', () => {
  let component: UsuariosFormularioPage;
  let fixture: ComponentFixture<UsuariosFormularioPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ UsuariosFormularioPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(UsuariosFormularioPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
