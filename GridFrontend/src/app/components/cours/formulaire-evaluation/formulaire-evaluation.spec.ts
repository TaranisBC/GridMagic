import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormulaireEvaluation } from './formulaire-evaluation';

describe('FormulaireEvaluation', () => {
  let component: FormulaireEvaluation;
  let fixture: ComponentFixture<FormulaireEvaluation>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [FormulaireEvaluation],
    }).compileComponents();

    fixture = TestBed.createComponent(FormulaireEvaluation);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
