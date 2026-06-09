import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CoursFormulaireComponent } from './cours-formulaire-component';

describe('CoursFormulaireComponent', () => {
  let component: CoursFormulaireComponent;
  let fixture: ComponentFixture<CoursFormulaireComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CoursFormulaireComponent],
    }).compileComponents();

    fixture = TestBed.createComponent(CoursFormulaireComponent);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
