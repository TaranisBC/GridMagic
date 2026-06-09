import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CoursHomeComponent } from './cours-home-component';

describe('CoursHomeComponent', () => {
  let component: CoursHomeComponent;
  let fixture: ComponentFixture<CoursHomeComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CoursHomeComponent],
    }).compileComponents();

    fixture = TestBed.createComponent(CoursHomeComponent);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
