import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CorrectionEtudiant } from './correction-etudiant';

describe('CorrectionEtudiant', () => {
  let component: CorrectionEtudiant;
  let fixture: ComponentFixture<CorrectionEtudiant>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CorrectionEtudiant],
    }).compileComponents();

    fixture = TestBed.createComponent(CorrectionEtudiant);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
