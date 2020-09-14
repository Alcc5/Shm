import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { GruposFiltrosPage } from './grupos-filtros.page';

describe('GruposFiltrosPage', () => {
  let component: GruposFiltrosPage;
  let fixture: ComponentFixture<GruposFiltrosPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GruposFiltrosPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(GruposFiltrosPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
