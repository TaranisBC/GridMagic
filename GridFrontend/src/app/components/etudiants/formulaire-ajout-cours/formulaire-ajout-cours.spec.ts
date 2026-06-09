import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormulaireAjoutCours } from './formulaire-ajout-cours';

describe('FormulaireAjoutCours', () => {
  let component: FormulaireAjoutCours;
  let fixture: ComponentFixture<FormulaireAjoutCours>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [FormulaireAjoutCours],
    }).compileComponents();

    fixture = TestBed.createComponent(FormulaireAjoutCours);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
