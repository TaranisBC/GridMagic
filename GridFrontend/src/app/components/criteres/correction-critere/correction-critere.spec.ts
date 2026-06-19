import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CorrectionCritere } from './correction-critere';

describe('CorrectionCritere', () => {
  let component: CorrectionCritere;
  let fixture: ComponentFixture<CorrectionCritere>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CorrectionCritere],
    }).compileComponents();

    fixture = TestBed.createComponent(CorrectionCritere);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
