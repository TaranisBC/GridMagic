import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EvaluationHome } from './evaluation-home';

describe('EvaluationHome', () => {
  let component: EvaluationHome;
  let fixture: ComponentFixture<EvaluationHome>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EvaluationHome],
    }).compileComponents();

    fixture = TestBed.createComponent(EvaluationHome);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
