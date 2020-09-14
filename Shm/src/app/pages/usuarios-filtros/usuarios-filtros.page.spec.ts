import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { UsuariosFiltrosPage } from './usuarios-filtros.page';

describe('UsuariosFiltrosPage', () => {
  let component: UsuariosFiltrosPage;
  let fixture: ComponentFixture<UsuariosFiltrosPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ UsuariosFiltrosPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(UsuariosFiltrosPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
